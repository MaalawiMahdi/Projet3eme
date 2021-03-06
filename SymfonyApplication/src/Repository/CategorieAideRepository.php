<?php

namespace App\Repository;

use App\Entity\CategorieAide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieAide|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieAide|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieAide[]    findAll()
 * @method CategorieAide[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieAideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieAide::class);
    }

    // /**
    //  * @return CategorieAide[] Returns an array of CategorieAide objects
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
    public function findOneBySomeField($value): ?CategorieAide
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function search($titre){

        return $this->createQueryBuilder('s')
            ->andWhere('s.titre LIKE :titre ')
            ->setParameter('titre', '%'.$titre.'%')
            ->getQuery()
            ->execute();
    }
}
