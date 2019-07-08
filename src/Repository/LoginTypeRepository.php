<?php

namespace App\Repository;

use App\Entity\LoginType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LoginType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginType[]    findAll()
 * @method LoginType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LoginType::class);
    }

    // /**
    //  * @return LoginType[] Returns an array of LoginType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginType
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
