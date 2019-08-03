<?php

namespace App\Repository;

use App\Entity\Enseignant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Enseignant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enseignant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enseignant[]    findAll()
 * @method Enseignant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnseignantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Enseignant::class);
    }

     /**
      * @return Enseignant[] Returns an array of Enseignant objects
      */
    public function findAllLimite($offset)
    {
        return $this->createQueryBuilder('e')
           /* ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)*/
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(3)
            ->setFirstResult($offset*3)
            ->getQuery()
            ->getResult()
        ;
    }
    public function countAll()
    {
        return $this->createQueryBuilder('e')
            ->select('count(e.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public  function search($search)
    {
        return $this->createQueryBuilder('e')
            ->where('e.nom = :val')
            ->setParameter('val',$search)
            ->orWhere('e.prenom = :val')
            ->setParameter('val',$search)
            ->getQuery()
            ->getResult();
    }

    public function count_vacataire()
    {
        return $this->createQueryBuilder('e')
            ->select('count(e.id)')
            ->innerJoin('e.type','t')
            ->where('t.type = :val')
            ->setParameter('val','vacataire')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function count_permanent()
    {
        return $this->createQueryBuilder('e')
            ->select('count(e.id)')
            ->innerJoin('e.type','t')
            ->where('t.type = :val')
            ->setParameter('val','permanent')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function find_by_critere($search)
    {
        $entityManager = $this->getEntityManager();
        $sql = "SELECT e FROM App\Entity\Enseignant e WHERE e.nom LIKE '%$search%' OR e.prenom LIKE '%$search%'";
        $query = $entityManager->createQuery($sql);
        return $query->execute();
    }

    /*
    public function findOneBySomeField($value): ?Enseignant
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
