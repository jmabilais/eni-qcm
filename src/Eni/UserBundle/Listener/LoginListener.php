<?php

namespace Eni\UserBundle\Listener;

use Eni\UserBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener {

	/**
	 * @var SecurityContext
	 */
	private $oSecurityContext;

	/**
	 * @var Router
	 */
	private $oRouter;

	/**
	 * @var TraceableEventDispatcher
	 */
	private $oEventDispatcher;

	public function __construct(SecurityContext $oSecurityContext, Router $oRouter, TraceableEventDispatcher $oEventDispatcher) {
		$this->oSecurityContext = $oSecurityContext;
		$this->oRouter = $oRouter;
		$this->oEventDispatcher = $oEventDispatcher;
	}

	public function onSecurityInteractiveLogin(InteractiveLoginEvent $oEvent) {
		// on écoute l'événement kernel.response
		$this->oEventDispatcher->addListener(KernelEvents::RESPONSE, [$this, 'redirigeUtilisateurVersPageAccueil']);
	}

	public function redirigeUtilisateurVersPageAccueil(FilterResponseEvent $oResponseEvent) {
		$oUtilisateurConnecte = $this->oSecurityContext->getToken()->getUser();
		/* @var $oUtilisateurConnecte Utilisateur */

		if ($oUtilisateurConnecte->isFormateur() || $oUtilisateurConnecte->isAdmin()) {
			$oResponse = new RedirectResponse($this->oRouter->generate('accueil_administration'));
			$oResponseEvent->setResponse($oResponse);
		} else {
			$oResponse = new RedirectResponse($this->oRouter->generate('accueil_candidat'));
			$oResponseEvent->setResponse($oResponse);
		}
	}
}