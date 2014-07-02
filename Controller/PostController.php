<?php

namespace PP\AcmeBundle\Controller;

use PP\AcmeBundle\Entity\Post;
use PP\AcmeBundle\Form\PostSearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{

    public function indexAction(Request $request)
    {

        $searchPost = new Post(null, null, array(), null);
        $form = $this->createForm(new PostSearchType(), $searchPost);
        $form->bind($request);

        $entities = $this->get('pp_acme.post.provider')->findAllBy($searchPost);

        return $this->render('PPAcmeBundle:Post:index.html.twig', array(
            'entities' => $entities,
            'form'     => $form->createView(),
        ));
    }

}
