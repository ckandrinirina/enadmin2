<?php

namespace App\Repository;

use App\Entity\SalleClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SalleClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalleClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalleClass[]    findAll()
 * @method SalleClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalleClassRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SalleClass::class);
    }

    // /**
    //  * @return SalleClass[] Returns an array of SalleClass objects
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
    public function findOneBySomeField($value): ?SalleClass
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
