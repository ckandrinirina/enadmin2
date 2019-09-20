<?php

namespace App\Repository;

use App\Entity\AnneUniversitaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AnneUniversitaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnneUniversitaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnneUniversitaire[]    findAll()
 * @method AnneUniversitaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnneUniversitaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AnneUniversitaire::class);
    }

    public function findLatestAu()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.anneUniversitaire','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    public function findAllByOrder()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.anneUniversitaire','DESC')
            ->getQuery()
            ->getResult();
    }
    public function findAllByOrderLimit()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.anneUniversitaire','DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return AnneUniversitaire[] Returns an array of AnneUniversitaire objects
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
    public function findOneBySomeField($value): ?AnneUniversitaire
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
