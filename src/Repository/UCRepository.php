<?php

namespace App\Repository;

use App\Entity\UC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UC|null find($id, $lockMode = null, $lockVersion = null)
 * @method UC|null findOneBy(array $criteria, array $orderBy = null)
 * @method UC[]    findAll()
 * @method UC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UCRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UC::class);
    }

    public function findAllCustom()
    {
        return $this->createQueryBuilder('u')
            ->innerJoin('u.eCs','e')
            ->addSelect('e')
            ->innerJoin('e.enseignant','ens')
            ->addSelect('ens')
            ->getQuery()
            ->getResult();
    }

    public function find_by_niveaux($niveau)
    {
        return $this->createQueryBuilder('u')
            ->innerJoin('u.niveaux','n','WITH','n.id = :val1')
            ->setParameter('val1',$niveau)
            ->addSelect('n')
            ->getQuery()
            ->getResult();
    }
    public function find_with_niveux($niveau)
    {
        return $this->createQueryBuilder('e')
                    ->innerJoin('e.niveaux','n')
                    ->addSelect('n')
                    ->where('e.id = :val')
                    ->setParameter('val',$niveau)
                    ->getQuery()
                    ->getResult();
    }

    // /**
    //  * @return UC[] Returns an array of UC objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UC
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
