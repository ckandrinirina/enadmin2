<?php

namespace App\Repository;

use App\Entity\EmploiDuTemps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmploiDuTemps|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmploiDuTemps|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmploiDuTemps[]    findAll()
 * @method EmploiDuTemps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmploiDuTempsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmploiDuTemps::class);
    }

    public function specialFindOne($niveaux,$heures,$jours)
    {
        return $this->createQueryBuilder('e')
            ->where('e.niveau = :val1')
            ->andWhere('e.heure= :val2')
            ->andWhere('e.jour= :val3')
            ->setParameter('val1',$niveaux)
            ->setParameter('val2',$heures)
            ->setParameter('val3',$jours)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return EmploiDuTemps[] Returns an array of EmploiDuTemps objects
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
    public function findOneBySomeField($value): ?EmploiDuTemps
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
