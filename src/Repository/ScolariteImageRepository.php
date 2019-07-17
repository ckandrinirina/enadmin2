<?php

namespace App\Repository;

use App\Entity\ScolariteImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ScolariteImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScolariteImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScolariteImage[]    findAll()
 * @method ScolariteImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScolariteImageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ScolariteImage::class);
    }

    // /**
    //  * @return ScolariteImage[] Returns an array of ScolariteImage objects
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
    public function findOneBySomeField($value): ?ScolariteImage
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
