<?php

namespace Eni\BackendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\BackendBundle\Entity\Question;
use Eni\BackendBundle\Entity\Theme;


class LoadQuestionData extends AbstractFixture implements OrderedFixtureInterface
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
        $themePHP = $manager->getRepository('EniBackendBundle:Theme')->findByLibelle('PHP');
        
        $question1 = new Question();
        $question1->setEnonce("Qu'est-ce qu'un array ?");
        $question1->setTheme($themePHP);
        $manager->persist($question1);

        $question2 = new Question();
        $question2->setEnonce('Si $a = 12; $b = 53; $c = $a++; Alors $c =');
        $question2->setTheme($themePHP);
        $manager->persist($question2);

        $question3 = new Question();
        $question3->setEnonce("A quoi sert \"echo\" ?");
        $question3->setTheme($themePHP);
        $manager->persist($question3);

        /*$question4 = new Question();
        $question4->setEnonce("A quoi peuvent servir les sessions ?");
        $question4->setTheme($themePHP);
        $manager->persist($question4);

        $question5 = new Question();
        $question5->setEnonce("Que fait la fonction str_replace('/', '-', $a); ?");
        $question5->setTheme($themePHP);
        $manager->persist($question5);

        $question6 = new Question();
        $question6->setEnonce("Lors de l'apparition d'une erreur 404 quelle est l'information envoyée au serveur pour signifier que la page n'a pas été trouvée ?");
        $question6->setTheme($themePHP);
        $manager->persist($question6);

        $question7 = new Question();
        $question7->setEnonce("Quel est le paramètre PHP susceptible d'ajouter des \ devant les \" lors de l'envoi d'un formulaire ?");
        $question7->setTheme($themePHP);
        $manager->persist($question7);*/

        $manager->flush();
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 4; // l'ordre dans lequel les fichiers sont chargés
    }
}