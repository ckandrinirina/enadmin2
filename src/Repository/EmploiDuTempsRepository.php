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

    public function specialFindOne($niveaux, $heures, $jours, $semestre)
    {
        return $this->createQueryBuilder('e')
            ->where('e.niveau = :val1')
            ->andWhere('e.heure= :val2')
            ->andWhere('e.jour= :val3')
            ->andWhere('e.semestre= :val4')
            ->setParameter('val1', $niveaux)
            ->setParameter('val2', $heures)
            ->setParameter('val3', $jours)
            ->setParameter('val4', $semestre)
            ->getQuery()
            ->getResult();
    }

    public function find_by_niveaux_semestres_jours($niveaux, $semestre,$jours)
    {
        return $this->createQueryBuilder('e')
            ->innerJoin('e.ec','ec')
            ->addSelect('ec')
            ->innerJoin('ec.enseignant','ens')
            ->where('e.niveau = :val1')
            ->andWhere('e.jour = :val2')
            ->andWhere('e.semestre= :val4')
            ->orderBy('e.heure','ASC')
            ->setParameter('val1', $niveaux)
            ->setParameter('val2',$jours)
            ->setParameter('val4', $semestre)
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
