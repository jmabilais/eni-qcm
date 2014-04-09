<?php

namespace Eni\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil_candidat")
     * @Template()
     */
    public function indexAction()
            
    {   $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $tests = $em->getRepository('EniBackendBundle:Test')
                ->getTestsByUser($user);
      
        return array('tests' => $tests);
    }
}
