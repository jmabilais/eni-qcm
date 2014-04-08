<?php

namespace Eni\FrontendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\FrontendBundle\Entity\Promotion;


class LoadQuestionTirageData extends AbstractFixture implements OrderedFixtureInterface
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
        $promotion = new Promotion();
        $promotion->setLibelle('CDI007');

        $manager->persist($promotion);
        $manager->flush();
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 9; // l'ordre dans lequel les fichiers sont chargés
    }
}