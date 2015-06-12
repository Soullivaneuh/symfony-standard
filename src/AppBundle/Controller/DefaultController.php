<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/app/issue-14915", name="issue_14915")
     */
    public function issue14915Action()
    {
        $productsChoices = $this->getDoctrine()->getRepository('AppBundle:Product')->getChoicesGroupByCategory();
        dump($productsChoices);

        $form = $this->createFormBuilder()
            ->add('product', 'entity', array(
                'class'         => 'AppBundle\Entity\Product',
                'choices'       => $productsChoices,
                'property'      => 'nameWithPrice',
            ))
            ->getForm()
        ;

        return $this->render('default/issue_14915.html.twig', array(
            'form'      => $form->createView(),
        ));
    }
}
