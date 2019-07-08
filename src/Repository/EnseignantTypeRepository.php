<?php

namespace App\Repository;

use App\Entity\EnseignantType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EnseignantType|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnseignantType|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnseignantType[]    findAll()
 * @method EnseignantType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnseignantTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EnseignantType::class);
    }

    // /**
    //  * @return EnseignantType[] Returns an array of EnseignantType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnseignantType
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
