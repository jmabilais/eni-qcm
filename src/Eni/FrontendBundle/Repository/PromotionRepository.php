<?php

namespace Eni\FrontendBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PromotionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PromotionRepository extends EntityRepository
{
	public function findByLibelle($libelle)
    {
        $alias = 'p';
        $qb = $this->createQueryBuilder($alias);
        $qb
            ->where('p.libelle LIKE :libelle')
            ->setParameter('libelle', '%' . $libelle . '%')
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
