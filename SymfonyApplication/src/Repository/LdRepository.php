<?php

namespace App\Repository;

use App\Entity\Ld;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ld|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ld|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ld[]    findAll()
 * @method Ld[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ld::class);
    }

    // /**
    //  * @return Ld[] Returns an array of Ld objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ld
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
