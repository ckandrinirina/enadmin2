<?php

namespace App\Repository;

use App\Entity\Moyenne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Moyenne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Moyenne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Moyenne[]    findAll()
 * @method Moyenne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoyenneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Moyenne::class);
    }

    public function find_by_e_s_n_au($etudiant, $semestre, $niveaux, $au)
    {
        return $this->createQueryBuilder('m')
        ->innerJoin('m.etudiant','e','WITH','e.id = :val3')
        ->setParameter('val3',$etudiant)
        ->addSelect('e')
        ->innerJoin('m.niveau','niv','WITH','niv.id = :val1')
        ->setParameter('val1',$niveaux)
        ->addSelect('niv')
        ->innerJoin('m.semestre','s','WITH','s.id = :val2')
        ->setParameter('val2',$semestre)
        ->addSelect('s')
        ->innerJoin('m.anneUniversitaire','au','WITH','au.id = :val5')
        ->setParameter('val5',$au)
        ->addSelect('au')
        ->getQuery()
        ->getResult();   
    }

    // /**
    //  * @return Moyenne[] Returns an array of Moyenne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Moyenne
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
