<?php

namespace App\Repository;

use App\Entity\TypeParcours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeParcours|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeParcours|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeParcours[]    findAll()
 * @method TypeParcours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeParcoursRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeParcours::class);
    }

    // /**
    //  * @return TypeParcours[] Returns an array of TypeParcours objects
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
    public function findOneBySomeField($value): ?TypeParcours
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
