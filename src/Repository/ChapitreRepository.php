<?php

namespace Labstag\Repository;

use Labstag\Entity\Chapitre;
use Labstag\Lib\ServiceEntityRepositoryLib;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chapitre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chapitre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chapitre[]    findAll()
 * @method Chapitre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChapitreRepository extends ServiceEntityRepositoryLib
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chapitre::class);
    }

    // /**
    //  * @return Chapitre[] Returns an array of Chapitre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chapitre
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}