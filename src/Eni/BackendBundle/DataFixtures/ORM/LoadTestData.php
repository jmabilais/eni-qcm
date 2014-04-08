<?php

namespace Eni\BackendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Eni\BackendBundle\Entity\Test;


class LoadTestData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $formateur1 = $this->getReference('jmabilais');
        $formateur2 = $this->getReference('pvakala');

        $test = new Test();
        $test->setLibelle("Test basique PHP");
        $test->setDescription("Connaissez-vous les bases du langage PHP?");
        $test->setDuree(2);
        $test->setSeuil(60);
        $test->setUtilisateur($formateur1);

        $manager->persist($test);

        $test2 = new Test();
        $test2->setLibelle("JS / DOM débutant");
        $test2->setDescription("Test facile sur les bases du javascript");
        $test2->setDuree(2);
        $test2->setSeuil(60);
        $test2->setUtilisateur($formateur2);

        $manager->persist($test2);

        $manager->flush();

        $this->addReference('test1', $test);
        $this->addReference('test2', $test2);
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 6; // l'ordre dans lequel les fichiers sont chargés
    }
}