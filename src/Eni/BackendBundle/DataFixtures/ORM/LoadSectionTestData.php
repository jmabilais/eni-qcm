<?php

namespace Eni\BackendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\BackendBundle\Entity\SectionTest;


class LoadSectionTestData extends AbstractFixture implements OrderedFixtureInterface
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
        $tests = $manager->getRepository('EniBackendBundle:Test')->findAll();
        $themePHP = $manager->getRepository('EniBackendBundle:Theme')->findByLibelle('PHP');
        
        $sectionTest1 = new SectionTest();
        $sectionTest1->setNbQuestionsATirer(20);
        $sectionTest1->setTheme($themePHP);
        $sectionTest1->setTest($tests[0]);

        $manager->persist($sectionTest1);
        $manager->flush();
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 7; // l'ordre dans lequel les fichiers sont chargés
    }
}