<?php

namespace App\Repository;

use App\Entity\Aide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aide|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aide|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aide[]    findAll()
 * @method Aide[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aide::class);
    }

    // /**
    //  * @return Aide[] Returns an array of Aide objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aide
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function search($titre){

        return $this->createQueryBuilder('s')
            ->join('s.categorie', 'c')
            ->where('s.titre LIKE :titre Or s.description LIKE :description Or s.adresse LIKE :adresse Or s.num_tell LIKE :num_tell OR s.categorie = :categorieid OR  c.titre LIKE :titres')

            ->setParameters(array('titre'=>'%'.$titre.'%','description'=>'%'.$titre.'%','adresse'=>'%'.$titre.'%','num_tell'=>'%'.$titre.'%','categorieid'=>$titre,'titres'=>'%'.$titre.'%'))
            ->getQuery()
            ->execute();
    }
    public function searchtri($titre){

        return $this->createQueryBuilder('s')
            ->join('s.categorie', 'c')
            ->where('s.titre LIKE :titre Or s.description LIKE :description Or s.adresse LIKE :adresse Or s.num_tell LIKE :num_tell OR s.categorie = :categorieid OR  c.titre = :titres')

            ->setParameters(array('titre'=>'%'.$titre.'%','description'=>'%'.$titre.'%','adresse'=>'%'.$titre.'%','num_tell'=>'%'.$titre.'%','categorieid'=>$titre,'titres'=>'%'.$titre.'%'))
            ->orderBy('s.titre', 'ASC')
            ->getQuery()
            ->execute();
    }
    public function searchs($titre,$idCategorie){

        return $this->createQueryBuilder('s')
            ->where('s.titre LIKE :titre Or s.description LIKE :description Or s.adresse LIKE :adresse Or s.num_tell LIKE :num_tell ')
            ->andWhere('s.categorie = :categorieid')
            ->setParameters(array('titre'=>'%'.$titre.'%','description'=>'%'.$titre.'%','adresse'=>'%'.$titre.'%','num_tell'=>'%'.$titre.'%','categorieid'=>$idCategorie))
            ->getQuery()
            ->execute();
    }
    public function findAlltri()
    {
        return $this->findBy(array(), array('titre' => 'ASC'));
    }

}
