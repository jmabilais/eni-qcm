<?php

namespace Eni\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
    */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $userJo = $userManager->createUser();
        $userJo->setUsername('jmabilais');
        $userJo->setPlainPassword('test');
        $userJo->setNom('Mabilais');
        $userJo->setPrenom('Jonathan');
        $userJo->addRole('ROLE_FORMATEUR');
        $userJo->setEnabled(true);
        $userJo->setEmail('jonathan.mabilais@campus-eni.fr');

        $manager->persist($userJo);
        $manager->flush();

        $userPierre = $userManager->createUser();
        $userPierre->setUsername('pvakala');
        $userPierre->setPlainPassword('test');
        $userPierre->setNom('Vakala');
        $userPierre->setPrenom('Pierre');
        $userPierre->addRole('ROLE_FORMATEUR');
        $userPierre->setEnabled(true);
        $userPierre->setEmail('a3ka@live.fr');
        
        $userCandidat1 = $userManager->createUser();
        $userCandidat1->setUsername('cand1');
        $userCandidat1->setPlainPassword('test');
        $userCandidat1->setNom('Examen');
        $userCandidat1->setPrenom('Info');
        $userCandidat1->addRole('ROLE_CANDIDAT');
        $userCandidat1->setEnabled(true);
        $userCandidat1->setEmail('a3ka@live.fr');
        $userCandidat1->setPromotion('CDI007');

        $manager->persist($userPierre);
        $manager->flush();
    }
}