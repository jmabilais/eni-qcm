<?php

namespace Eni\FrontendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\FrontendBundle\Entity\Inscription;
use Eni\UserBundle\Entity\Utilisateur;


class LoadInscriptionData extends AbstractFixture implements OrderedFixtureInterface
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
        $inscription = new Inscription();
        $validite = new \DateTime('2014-12-12');
        $inscription->setDureeValidite($validite);
        $inscription->setEtat(false);
        $test = $this->getReference('test1');
        $inscription->setTest($test);
        $candidat1 = $manager->getRepository('EniUserBundle:Utilisateur')->findByUsername('cand1');

        $inscription->setUtilisateur($candidat1);

        $manager->persist($inscription);
        $manager->flush();
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 8; // l'ordre dans lequel les fichiers sont chargés
    }
}