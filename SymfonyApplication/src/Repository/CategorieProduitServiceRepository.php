<?php

namespace App\Repository;

use App\Entity\CategorieProduitService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieProduitService|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieProduitService|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieProduitService[]    findAll()
 * @method CategorieProduitService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieProduitServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieProduitService::class);
    }

    // /**
    //  * @return CategorieProduitService[] Returns an array of CategorieProduitService objects
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
    public function findOneBySomeField($value): ?CategorieProduitService
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
