<?php

namespace App\Repository;

use App\Entity\CategorieProduitService;
use App\Entity\ProduitService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProduitService|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitService|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitService[]    findAll()
 * @method ProduitService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitService::class);
    }









    // /**
    //  * @return ProduitService[] Returns an array of ProduitService objects
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

    public function findProdCat(): array
    {
        $entityManager = $this->getEntityManager();
        //'SELECT p , c FROM App\Entity\ProduitService p JOIN App\Entity\CategorieProduitService c ON p.id_categorie == c.id '
        $query = $entityManager ->createQueryBuilder()
            ->select('p.titre', 'p.description', 'p.lien_image', 'c.nom', 'p.id', 'p.prix_unitaire')
            ->from(ProduitService::class, 'p')
        ->innerJoin(CategorieProduitService::class, 'c', 'WITH','p.categorie = c.id');

        return $query->getQuery()->getArrayResult();
    }

    /*
    public function findOneBySomeField($value): ?ProduitService
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
