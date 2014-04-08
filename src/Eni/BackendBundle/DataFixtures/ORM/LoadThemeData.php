<?php

namespace Eni\BackendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\BackendBundle\Entity\Theme;


class LoadThemeData extends AbstractFixture implements OrderedFixtureInterface
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
        $theme1 = new Theme();
        $theme1->setLibelle("PHP");
        $manager->persist($theme1);

        $theme2 = new Theme();
        $theme2->setLibelle("Java");
        $manager->persist($theme2);

        $theme3 = new Theme();
        $theme3->setLibelle("Javascript");
        $manager->persist($theme3);

        $theme4 = new Theme();
        $theme4->setLibelle(".Net");
        $manager->persist($theme4);

        $theme5 = new Theme();
        $theme5->setLibelle("SQL");
        $manager->persist($theme5);

        $manager->flush();
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 3; // l'ordre dans lequel les fichiers sont chargés
    }
}