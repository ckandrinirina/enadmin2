<?php

namespace App\Repository;

use App\Entity\FicheIndividuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FicheIndividuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheIndividuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheIndividuel[]    findAll()
 * @method FicheIndividuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheIndividuelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FicheIndividuel::class);
    }

    // /**
    //  * @return FicheIndividuel[] Returns an array of FicheIndividuel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FicheIndividuel
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
