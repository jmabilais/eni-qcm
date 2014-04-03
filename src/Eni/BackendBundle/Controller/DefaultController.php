<?php

namespace Eni\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/administration", name="accueil_administration")
     * @Template()
     */
    public function indexAction()
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$name = $user->getNom();
    	$firstname = $user->getPrenom();
        return array('nom' => $name, 'prenom' => $firstname);
    }
}