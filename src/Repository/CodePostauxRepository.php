<?php

namespace App\Repository;

use App\Entity\CodePostaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CodePostaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodePostaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodePostaux[]    findAll()
 * @method CodePostaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodePostauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodePostaux::class);
    }

    // /**
    //  * @return CodePostaux[] Returns an array of CodePostaux objects
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
    public function findOneBySomeField($value): ?CodePostaux
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
