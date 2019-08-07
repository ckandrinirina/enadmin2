<?php

namespace App\Repository;

use App\Entity\EC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EC|null find($id, $lockMode = null, $lockVersion = null)
 * @method EC|null findOneBy(array $criteria, array $orderBy = null)
 * @method EC[]    findAll()
 * @method EC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ECRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EC::class);
    }

    public function countAll()
    {
        return $this->createQueryBuilder('e')
            ->select('count(e.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findEcByEnseignant($id_enseignant)
    {
        return $this->createQueryBuilder('e')
            ->innerJoin('e.enseignant','ens','WITH','ens.id = :id_enseignant')
            ->setParameter('id_enseignant',$id_enseignant)
            ->getQuery()
            ->getResult();
    }


/*    public function findByPag()
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.repartitionEC.niveaux = :val')
            ->setParameter('val', '738')
//            ->orderBy('e.id', 'ASC')
            ->setMaxResults(2)
            ->getQuery()
            ->getResult()
        ;
    }*/

    /*
    public function findOneBySomeField($value): ?EC
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
