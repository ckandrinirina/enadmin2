<?php

namespace App\Repository;

use App\Entity\RepartitionEC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RepartitionEC|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepartitionEC|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepartitionEC[]    findAll()
 * @method RepartitionEC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepartitionECRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RepartitionEC::class);
    }

    public function findByNiveauxBySemestre($niveaux,$semestre)
    {
        return $this->createQueryBuilder('r')
            ->where('r.niveaux = :val1')
            ->setParameter('val1',$niveaux)
            ->andWhere('r.semestre = :val2')
            ->setParameter('val2',$semestre)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return RepartitionEC[] Returns an array of RepartitionEC objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RepartitionEC
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
