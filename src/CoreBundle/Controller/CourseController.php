<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Course;
use CoreBundle\Entity\Poi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Course controller.
 *
 */
class CourseController extends Controller
{
    /**
     * Lists all course entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('CoreBundle:Course')->findAll();

        return $this->render('course/index.html.twig', array(
            'courses' => $courses,
        ));
    }

    /**
     * Creates a new course entity.
     *
     */
    public function newAction(Request $request)
    {
        $course = new Course();
        $form = $this->createForm('CoreBundle\Form\CourseType', $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush($course);

            return $this->redirectToRoute('course_show', array('id' => $course->getId()));
        }

        return $this->render('course/new.html.twig', array(
            'course' => $course,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a course entity.
     *
     */
    public function showAction(Course $course)
    {
        $deleteForm = $this->createDeleteForm($course);

        return $this->render('course/show.html.twig', array(
            'course' => $course,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function ajaxCourseAction(Course $course){
        $em = $this->getDoctrine()->getManager();
        $pois = $em->getRepository("CoreBundle:Poi")->findTheStages(
            $course->getOrigin(),
            $course->getFirstStage(),
            $course->getSecondStage(),
            $course->getThirdStage());

        /** @var Poi $poi */
        $coursesPois = array();

        foreach ($pois as $poi){
            $data['latitude'] = $poi->getLatitude();
            $data['longitude'] = $poi->getLongitude();
            $data['name'] = $poi->getName();
            $data['type'] = $poi->getType();
            $data['typeDetail'] = $poi->getTypeDetail();
            $data['adress'] = $poi->getAdress();
            $data['postalCode'] = $poi->getPostalCode();
            $data['city'] = $poi->getCity();
            $data['phoneNumber'] = $poi->getPhoneNumber();
            $data['faxNumber'] = $poi->getFaxNumber();
            $data['email'] = $poi->getEmail();
            $data['websiteUrl'] = $poi->getWebsiteUrl();
            $data['facebookUrl'] = $poi->getFacebookUrl();
            $data['grading'] = $poi->getGrading();
            $data['openingHours'] = $poi->getOpeningHours();
            $data['tariff'] = $poi->getTariff();
            $coursesPois[] = $data;
        }
        return new JsonResponse($coursesPois);
    }

    /**
     * Displays a form to edit an existing course entity.
     *
     */
    public function editAction(Request $request, Course $course)
    {
        $deleteForm = $this->createDeleteForm($course);
        $editForm = $this->createForm('CoreBundle\Form\CourseType', $course);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('course_edit', array('id' => $course->getId()));
        }

        return $this->render('course/edit.html.twig', array(
            'course' => $course,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a course entity.
     *
     */
    public function deleteAction(Request $request, Course $course)
    {
        $form = $this->createDeleteForm($course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($course);
            $em->flush($course);
        }

        return $this->redirectToRoute('course_index');
    }

    /**
     * Creates a form to delete a course entity.
     *
     * @param Course $course The course entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Course $course)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('course_delete', array('id' => $course->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
