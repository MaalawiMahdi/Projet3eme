<?php

namespace App\Repository;

use App\Entity\CategorieBoard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieBoard|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieBoard|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieBoard[]    findAll()
 * @method CategorieBoard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieBoardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieBoard::class);
    }
    // /**
    //  * @return CategorieBoard[] Returns an array of CategorieBoard objects
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
    public function findOneBySomeField($value): ?CategorieBoard
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
