<?php

namespace App\Repository;

use App\Entity\ProdutiCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProdutiCommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProdutiCommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProdutiCommande[]    findAll()
 * @method ProdutiCommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdutiCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProdutiCommande::class);
    }

    // /**
    //  * @return ProdutiCommande[] Returns an array of ProdutiCommande objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProdutiCommande
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
