<?php

namespace App\Repository;

use App\Entity\NoteUc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NoteUc|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteUc|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteUc[]    findAll()
 * @method NoteUc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteUcRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NoteUc::class);
    }

    // public function find_by_uc_by_ratrapage_by_etudiant($uc,$ratrapage,$etudiant)
    // {
    //     return $this->createQueryBuilder('n')
    //         ->innerJoin('n.uc','u','WITH','u.id = :val1')
    //         ->setParameter('val1',$uc)
    //         ->addSelect('u')
    //         ->innerJoin('n.etudiant','e','WITH','e.id = :val3')
    //         ->setParameter('val3',$etudiant)
    //         ->addSelect('e')
    //         ->where('n.isRatarapage = :val2')
    //         ->setParameter('val2',$ratrapage)
    //         ->getQuery()
    //         ->getResult();
    // }
    
    public function find_by_etudiant_by_niveaux($etudiant,$niveaux,$semestre)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.etudiant','e','WITH','e.id = :etudiant')
            ->setParameter('etudiant',$etudiant)
            ->innerJoin('n.niveaux','niv','WITH','niv.id = :niveaux')
            ->setParameter('niveaux',$niveaux)
            ->innerJoin('n.semestre','sem','WITH','sem.id = :semestre')
            ->setParameter('semestre',$semestre)
            ->getQuery()
            ->getResult();
    }

    public function find_by_uc_by_ratrapage_by_etudiant($uc,$etudiant)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.uc','u','WITH','u.id = :val1')
            ->setParameter('val1',$uc)
            ->addSelect('u')
            ->innerJoin('n.etudiant','e','WITH','e.id = :val3')
            ->setParameter('val3',$etudiant)
            ->addSelect('e')
            ->getQuery()
            ->getResult();
    }

    public function find_note_uc($noteId)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.notes','nu','WITH','nu.id = :val1')
            ->setParameter('val1',$noteId)
            ->addSelect('nu')
            ->getQuery()
            ->getResult();
    }

    public function fin_by_e_n_s_r($etudiant,$niveaux,$semestre,$ratrapage,$au)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.etudiant','e','WITH','e.id = :val3')
            ->setParameter('val3',$etudiant)
            ->addSelect('e')
            ->innerJoin('n.niveaux','niv','WITH','niv.id = :val1')
            ->setParameter('val1',$niveaux)
            ->addSelect('niv')
            ->innerJoin('n.semestre','s','WITH','s.id = :val2')
            ->setParameter('val2',$semestre)
            ->addSelect('s')
            ->innerJoin('n.anneUniversitaire','au','WITH','au.id = :val5')
            ->setParameter('val5',$au)
            ->addSelect('au')
            ->where('n.isRatarapage = :val4')
            ->setParameter('val4',$ratrapage)
            ->getQuery()
            ->getResult();        
    }

    public function fin_by_e_n_s_r_2($etudiant,$niveaux,$semestre,$au)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.etudiant','e','WITH','e.id = :val3')
            ->setParameter('val3',$etudiant)
            ->addSelect('e')
            ->innerJoin('n.niveaux','niv','WITH','niv.id = :val1')
            ->setParameter('val1',$niveaux)
            ->addSelect('niv')
            ->innerJoin('n.semestre','s','WITH','s.id = :val2')
            ->setParameter('val2',$semestre)
            ->addSelect('s')
            ->innerJoin('n.anneUniversitaire','au','WITH','au.id = :val5')
            ->setParameter('val5',$au)
            ->addSelect('au')
            ->getQuery()
            ->getResult();        
    }


    // /**
    //  * @return NoteUc[] Returns an array of NoteUc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NoteUc
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
