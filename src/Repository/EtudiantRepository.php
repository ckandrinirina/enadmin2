<?php

namespace App\Repository;

use App\Entity\Etudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Etudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etudiant[]    findAll()
 * @method Etudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

    public function findByNiveauxOrderByName($niveaux)
    {
        return $this->createQueryBuilder('e')
            ->where('e.niveaux = :val')
            ->setParameter('val', $niveaux)
            ->orderBy('e.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function count_academique()
    {
        return $this->createQueryBuilder('e')
            ->select('count(e.id)')
            ->innerJoin('e.parcour', 'p')
            ->where('p.type = :val')
            ->setParameter('val', 'académique')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function count_professionnel()
    {
        return $this->createQueryBuilder('e')
            ->select('count(e.id)')
            ->innerJoin('e.parcour', 'p')
            ->where('p.type = :val')
            ->setParameter('val', 'professionnel')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function find_by_critere($search)
    {
        $entityManager = $this->getEntityManager();
        $sql = "SELECT e FROM App\Entity\Etudiant e WHERE e.nom LIKE '%$search%' OR e.prenom LIKE '%$search%'";
        $query = $entityManager->createQuery($sql);
        return $query->execute();
    }

    // /**
    //  * @return Etudiant[] Returns an array of Etudiant objects
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
    public function findOneBySomeField($value): ?Etudiant
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
