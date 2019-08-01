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
            ->innerJoin('r.niveaux','n','WITH','n.id = :val1')
            ->setParameter('val1',$niveaux)
            ->innerJoin('r.semestre','s','WITH','s.id = :val2')
            ->setParameter('val2',$semestre)
            ->getQuery()
            ->getResult();
    }

    public function find_by_s_n_ec($semestre,$niveau,$ec)
    {
        return $this->createQueryBuilder('r')
            ->innerJoin('r.niveaux','n','WITH','n.id = :val1')
            ->setParameter('val1',$niveau)
            ->innerJoin('r.semestre','s','WITH','s.id = :val2')
            ->setParameter('val2',$semestre)
            ->innerJoin('r.ec','e','WITH','e.id = :val3')
            ->setParameter('val3',$ec)
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
