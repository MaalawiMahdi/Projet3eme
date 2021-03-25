<?php

namespace App\Repository;

use App\Entity\Notesujet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Notesujet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notesujet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notesujet[]    findAll()
 * @method Notesujet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotesujetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notesujet::class);
    }

    // /**
    //  * @return Notesujet[] Returns an array of Notesujet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Notesujet
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
