<?php

namespace App\Repository;

use App\Entity\ParamGen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ParamGen|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParamGen|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParamGen[]    findAll()
 * @method ParamGen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParamGenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParamGen::class);
    }

    // /**
    //  * @return ParamGen[] Returns an array of ParamGen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParamGen
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
