<?php

namespace Eni\BackendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\BackendBundle\Entity\ReponseProposee;
use Eni\BackendBundle\Entity\Question;


class LoadReponseProposeeData extends AbstractFixture implements OrderedFixtureInterface
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
        /* Questions PHP */
        $questions = $manager->getRepository('EniBackendBundle:Question')->findAll();

        /* Question 1 : Qu'est-ce qu'un array ? */
        $Question1 = $questions[0];

        $ReponseProposee1_1 = new ReponseProposee();
        $ReponseProposee1_1->setEnonce("Une gamme");
        $ReponseProposee1_1->setQuestion($Question1);
        $ReponseProposee1_1->setValide(false);
        $manager->persist($ReponseProposee1_1);

        $ReponseProposee1_2 = new ReponseProposee();
        $ReponseProposee1_2->setEnonce("Un tableau");
        $ReponseProposee1_2->setQuestion($Question1);
        $ReponseProposee1_2->setValide(true);
        $manager->persist($ReponseProposee1_2);

        $ReponseProposee1_3 = new ReponseProposee();
        $ReponseProposee1_3->setEnonce("La définition d'une variable");
        $ReponseProposee1_3->setQuestion($Question1);
        $ReponseProposee1_3->setValide(false);
        $manager->persist($ReponseProposee1_3);

        $ReponseProposee1_4 = new ReponseProposee();
        $ReponseProposee1_4->setEnonce("Une fonction permettant la création d'une classe");
        $ReponseProposee1_4->setQuestion($Question1);
        $ReponseProposee1_4->setValide(false);
        $manager->persist($ReponseProposee1_4);


        /* Question 2 : Si $a = 12; $b = 53; $c = $a++; Alors $c = */
        $Question2 = $questions[1];

        $ReponseProposee2_1 = new ReponseProposee();
        $ReponseProposee2_1->setEnonce("13");
        $ReponseProposee2_1->setQuestion($Question2);
        $ReponseProposee2_1->setValide(true);
        $manager->persist($ReponseProposee2_1);

        $ReponseProposee2_2 = new ReponseProposee();
        $ReponseProposee2_2->setEnonce("65");
        $ReponseProposee2_2->setQuestion($Question2);
        $ReponseProposee2_2->setValide(true);
        $manager->persist($ReponseProposee2_2);

        $ReponseProposee2_3 = new ReponseProposee();
        $ReponseProposee2_3->setEnonce("12");
        $ReponseProposee2_3->setQuestion($Question2);
        $ReponseProposee2_3->setValide(true);
        $manager->persist($ReponseProposee2_3);

        $ReponseProposee2_4 = new ReponseProposee();
        $ReponseProposee2_4->setEnonce("ERROR");
        $ReponseProposee2_4->setQuestion($Question2);
        $ReponseProposee2_4->setValide(true);
        $manager->persist($ReponseProposee2_4);

        /* Question 3 : A quoi sert "echo" ? */
        $Question3 = $questions[2];

        $ReponseProposee2_5 = new ReponseProposee();
        $ReponseProposee2_5->setEnonce("Répéter plusieurs fois la même action");
        $ReponseProposee2_5->setQuestion($Question1);
        $ReponseProposee2_5->setValide(false);
        $manager->persist($ReponseProposee2_5);

        $ReponseProposee2_6 = new ReponseProposee();
        $ReponseProposee2_6->setEnonce("A faire référence à une autre variable");
        $ReponseProposee2_6->setQuestion($Question1);
        $ReponseProposee2_6->setValide(true);
        $manager->persist($ReponseProposee2_6);

        $ReponseProposee2_7 = new ReponseProposee();
        $ReponseProposee2_7->setEnonce("Changer la valeur d'une variable");
        $ReponseProposee2_7->setQuestion($Question1);
        $ReponseProposee2_7->setValide(true);
        $manager->persist($ReponseProposee2_7);

        $ReponseProposee2_8 = new ReponseProposee();
        $ReponseProposee2_8->setEnonce("Ecrire un message");
        $ReponseProposee2_8->setQuestion($Question1);
        $ReponseProposee2_8->setValide(true);
        $manager->persist($ReponseProposee2_8);

        $manager->flush();
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 5; // l'ordre dans lequel les fichiers sont chargés
    }
}