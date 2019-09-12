<?php

namespace App\Repository;

use App\Entity\InformationChild;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InformationChild|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformationChild|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformationChild[]    findAll()
 * @method InformationChild[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationChildRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InformationChild::class);
    }

    // /**
    //  * @return InformationChild[] Returns an array of InformationChild objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformationChild
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
