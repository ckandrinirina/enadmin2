<?php

namespace App\Repository;

use App\Entity\Heures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Heures|null find($id, $lockMode = null, $lockVersion = null)
 * @method Heures|null findOneBy(array $criteria, array $orderBy = null)
 * @method Heures[]    findAll()
 * @method Heures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeuresRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Heures::class);
    }

    // /**
    //  * @return Heures[] Returns an array of Heures objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Heures
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
