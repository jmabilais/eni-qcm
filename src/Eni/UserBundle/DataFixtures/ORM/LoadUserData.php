<?php

namespace Eni\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Eni\FrontendBundle\Entity\Promotion;


class LoadUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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

        $tUtilisateurs = [
            ['username' => 'mneute', 'nom' => 'neute', 'prenom' => 'Morgan', 'role' => 'ROLE_FORMATEUR', 'email' => 'mneute@eni.fr'],
            ['username' => 'ebertho', 'nom' => 'bertho', 'prenom' => 'Etienne', 'role' => 'ROLE_FORMATEUR', 'email' => 'ebertho@eni.fr'],
            ['username' => 'jmabilais', 'nom' => 'mabilais', 'prenom' => 'Jonathan', 'role' => 'ROLE_FORMATEUR', 'email' => 'jmabilais@eni.fr'],
            ['username' => 'pvakala', 'nom' => 'vakala', 'prenom' => 'Pierre', 'role' => 'ROLE_FORMATEUR', 'email' => 'pvakala@eni.fr'],
            ['username' => 'cand1', 'nom' => 'candidat', 'prenom' => 'candidat', 'role' => 'ROLE_CANDIDAT', 'email' => 'cand1@eni.fr'],
        ];

        foreach ($tUtilisateurs as $tUtilisateur) {
            $user = $userManager->createUser();
            $user->setUsername($tUtilisateur['username']);
            $user->setPlainPassword('test');
            $user->setNom($tUtilisateur['nom']);
            $user->setPrenom($tUtilisateur['prenom']);
            $user->addRole($tUtilisateur['role']);
            $user->setEnabled(true);
            $user->setEmail($tUtilisateur['email']);
            if($tUtilisateur['role'] == 'ROLE_CANDIDAT'){
                $promotion = $this->getReference('CDI7');
                $user->setPromotion($promotion);
            }
            $userManager->updateUser($user);
            $this->addReference($tUtilisateur['username'], $user);
        }
    }

    /**
    * {@inheritDoc}
    */
    public function getOrder()
    {
        return 2; // l'ordre dans lequel les fichiers sont chargés
    }
}