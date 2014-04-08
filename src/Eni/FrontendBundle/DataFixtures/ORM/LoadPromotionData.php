<?php

namespace Eni\FrontendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\FrontendBundle\Entity\Promotion;
use Eni\UserBundle\Entity\Utilisateur;


class LoadPromotionData extends AbstractFixture implements OrderedFixtureInterface
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
        $promos = ['CDI7','CDI8','CDI9'];

        foreach($promos as $promo){
            $promotion = new Promotion();
            $promotion->setLibelle($promo);
            $manager->persist($promotion);
            $this->addReference($promo, $promotion);
        }

        $manager->flush();        
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
}