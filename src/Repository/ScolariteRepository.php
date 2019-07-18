<?php

namespace App\Repository;

use App\Entity\Scolarite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Scolarite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scolarite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scolarite[]    findAll()
 * @method Scolarite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScolariteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Scolarite::class);
    }

    public function get_actual_scolarite($etudiant)
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.etudiant','e','WITH','e.id = :val1')
            ->innerJoin('s.niveau','n','WITH','n.id = :val2')
            ->setParameter('val1',$etudiant->getId())
            ->setParameter('val2',$etudiant->getNiveaux()->getId())
            ->getQuery()
            ->getResult();
    }

    public function find_if_exist($etudiant,$niveau)
    {
        return $this->createQueryBuilder('s')
        ->innerJoin('s.etudiant','e','WITH','e.id = :val1')
        ->innerJoin('s.niveau','n','WITH','n.id = :val2')
        ->setParameter('val1',$etudiant)
        ->setParameter('val2',$niveau)
        ->getQuery()
        ->getResult();
    }

    // /**
    //  * @return Scolarite[] Returns an array of Scolarite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scolarite
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
