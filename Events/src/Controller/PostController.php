<?php

namespace App\Controller;

use App\Entity\Events;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

    /**
     * @Route("/post", name="post.")
     */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
    	$posts = $this->getDoctrine()->getRepository('App:Events')->findAll();
    

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
* @Route("/show/{id}", name="show")
* @return Response
*/

public function show($id) {
    $post = $this->getDoctrine()->getRepository('App:Events')->find($id);


	return $this->render('post/show.html.twig', [
		'post' => $post,
	]);
}

    /**
* @Route("/delete/{id}", name="delete")
* @return Response
*/

public function remove($id) {
    $post = $this->getDoctrine()->getRepository('App:Events')->find($id);
    $em = $this->getDoctrine()->getManager();

    $em->remove($post);
    $em->flush();

	return $this->redirect($this->generateUrl('post.index'));
}

 /**
     * @Route("/create", name="create")
     */
public function create(Request $request) {

    $post = new Events();

    $form = $this->createFormBuilder($post)
             ->add('NAME', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('DATETIME', DateTimeType::Class, array('attr' => array('class' => 'form-control')))
            ->add('DESCRIPTION', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('IMAGE', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('CAPACITY', IntegerType::Class, array('attr' => array('class' => 'form-control')))
            ->add('EMAIL', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('PHONE', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('ADDRESS', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('URL', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::Class, array('label' => 'Create Post', 'attr' => array('class' =>
                'form-control')))
    ->getForm();
    $form->handleRequest($request);

    // entity manager
    $em = $this->getDoctrine()->getManager();

    if ($form->isSubmitted() && $form->isValid()){
        $NAME = $form['NAME']->getData();
        $DATETIME = $form['DATETIME']->getData();
        $DESCRIPTION = $form['DESCRIPTION']->getData();
        $IMAGE = $form['IMAGE']->getData();
        $CAPACITY = $form['CAPACITY']->getData();
        $EMAIL = $form['EMAIL']->getData();
        $PHONE = $form['PHONE']->getData();
        $ADDRESS = $form['ADDRESS']->getData();
        $URL = $form['URL']->getData();


        $post->setNAME($NAME);
        $post->setDATETIME($DATETIME);
        $post->setDESCRIPTION($DESCRIPTION);
        $post->setIMAGE($IMAGE);
        $post->setCAPACITY($CAPACITY);
        $post->setEMAIL($EMAIL);
        $post->setPHONE($PHONE);
        $post->setADDRESS($ADDRESS);
        $post->setURL($URL);
        
        $em = $this->getDoctrine()->getManager();

    $em->persist($post);
    $em->flush();


    return $this->redirect($this->generateUrl('post.index'));
}

    return $this->render('post/create.html.twig', [
        'form' => $form->createView()]);
}

/**
* @Route("/edit/{id}", name="edit")
*/

public function edit($id, Request $request)
{
       $post = $this->getDoctrine()->getRepository('App:Events')->find($id);
        $post->setNAME($post->getNAME());
        $post->setDATETIME($post->getDATETIME());
        $post->setDESCRIPTION($post->getDESCRIPTION());
        $post->setIMAGE($post->getIMAGE());
        $post->setCAPACITY($post->getCAPACITY());
        $post->setEMAIL($post->getEMAIL());
        $post->setPHONE($post->getPHONE());
        $post->setADDRESS($post->getADDRESS());
        $post->setURL($post->getURL());
        
    $form = $this->createFormBuilder($post)
 ->add('NAME', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('DATETIME', DateTimeType::Class, array('attr' => array('class' => 'form-control')))
            ->add('DESCRIPTION', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('IMAGE', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('CAPACITY', IntegerType::Class, array('attr' => array('class' => 'form-control')))
            ->add('EMAIL', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('PHONE', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('ADDRESS', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('URL', TextType::Class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::Class, array('label' => 'Save Changes', 'attr' => array('class' =>
                'form-control')))
    ->getForm();
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $NAME = $form['NAME']->getData();
        $DATETIME = $form['DATETIME']->getData();
        $DESCRIPTION = $form['DESCRIPTION']->getData();
        $IMAGE = $form['IMAGE']->getData();
        $CAPACITY = $form['CAPACITY']->getData();
        $EMAIL = $form['EMAIL']->getData();
        $PHONE = $form['PHONE']->getData();
        $ADDRESS = $form['ADDRESS']->getData();
        $URL = $form['URL']->getData();

    $em = $this->getDoctrine()->getManager();
        $post->setNAME($NAME);
        $post->setDATETIME($DATETIME);
        $post->setDESCRIPTION($DESCRIPTION);
        $post->setIMAGE($IMAGE);
        $post->setCAPACITY($CAPACITY);
        $post->setEMAIL($EMAIL);
        $post->setPHONE($PHONE);
        $post->setADDRESS($ADDRESS);
        $post->setURL($URL);

    $em->flush();
    $this->addFlash(
        'notice',
        'Post updated');
    return $this->redirect($this->generateUrl('post.index'));

    }

return $this->render('post/edit.html.twig', array('post' => $post, 'form' => $form->createView()));

}

}
