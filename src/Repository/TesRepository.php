<?php

namespace App\Repository;

use App\Entity\Tes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tes[]    findAll()
 * @method Tes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tes::class);
    }

    // /**
    //  * @return Tes[] Returns an array of Tes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tes
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
