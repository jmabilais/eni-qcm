<?php

namespace Eni\BackendBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Eni\UserBundle\Entity\Utilisateur;
//use Eni\FrontendBundle\Entity\Inscription;
/**
* TestRepository
*
* This class was generated by the Doctrine ORM. Add your own custom
* repository methods below.
*/
class TestRepository extends EntityRepository
{
    public function getTestsByUser(Utilisateur $user) {

        $qb = $this->createQueryBuilder('t');
        $qb->join('t.inscriptions','i')
            ->join('i.utilisateur','u')
            ->where('u.id = :id')
            ->setParameter('id',$user->getId());
        return $qb->getQuery()
                  ->getResult();
    }
}