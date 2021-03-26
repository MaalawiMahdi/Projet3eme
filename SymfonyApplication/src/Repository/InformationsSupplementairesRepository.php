<?php

namespace App\Repository;

use App\Entity\InformationsSupplementaires;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformationsSupplementaires|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationsSupplementaires|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationsSupplementaires[]    findAll()
 * @method InformationsSupplementaires[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationsSupplementairesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformationsSupplementaires::class);
    }

    // /**
    //  * @return InformationsSupplementaires[] Returns an array of InformationsSupplementaires objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformationsSupplementaires
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
