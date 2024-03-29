<?php

namespace App\Repository;

use App\Entity\Information;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Information|null find($id, $lockMode = null, $lockVersion = null)
 * @method Information|null findOneBy(array $criteria, array $orderBy = null)
 * @method Information[]    findAll()
 * @method Information[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Information::class);
    }

    public function findLastInformation()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.addAt','DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    public function findLastInformationByNiveaux($id_niveau)
    {
        $result = $this->createQueryBuilder('i')
            ->innerJoin('i.niveaux','n','WITH','n.id = :niveau')
            ->setParameter('niveau',$id_niveau)
            ->orderBy('i.addAt','DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
        return $result;
    }

    public function findLastInformationWithPagination($offset)
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.addAt','DESC')
            ->setMaxResults(5)
            ->setFirstResult($offset*5)
            ->orderBy('i.addAt','DESC')
            ->getQuery()
            ->getResult();
    }

    public function findLastInformationByNiveauxWithPagination($id_niveau,$offset)
    {
        $result = $this->createQueryBuilder('i')
            ->innerJoin('i.niveaux','n','WITH','n.id = :niveau')
            ->setParameter('niveau',$id_niveau)
            ->setMaxResults(5)
            ->setFirstResult($offset*5)
            ->orderBy('i.addAt','DESC')
            ->getQuery()
            ->getResult();
        return $result;
    }

    // /**
    //  * @return Information[] Returns an array of Information objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Information
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
