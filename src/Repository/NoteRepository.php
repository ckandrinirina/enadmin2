<?php

namespace App\Repository;

use App\Entity\Note;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Note|null find($id, $lockMode = null, $lockVersion = null)
 * @method Note|null findOneBy(array $criteria, array $orderBy = null)
 * @method Note[]    findAll()
 * @method Note[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Note::class);
    }

    public function find_last_note_1_s($etudiant, $ec, $semestre, $niveau, $au)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.etudiant','e','WITH','e.id = :etudiant')
            ->setParameter('etudiant',$etudiant)
            ->innerJoin('n.niveaux','niv','WITH','niv.id = :val')
            ->setParameter('val',$niveau)
            ->innerJoin('n.semestre','s','WITH','s.id = :val1')
            ->setParameter('val1',$semestre)
            ->innerJoin('n.anneUniversitaire','au','WITH', 'au.id = :val2')
            ->setParameter('val2',$au)
            ->innerJoin('n.EC','ec','WITH','ec.id = :ec')
            ->setParameter('ec',$ec)
            ->andWhere('n.isRatrapage = 0')
            ->getQuery()
            ->getResult();
    } 
    public function findByNiveauxBySemestreEtudiant($niveaux,$semestre,$au,$ratrapage)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.etudiant','e')
            ->where('n.niveaux = :val')
            ->setParameter('val',$niveaux)
            ->andWhere('n.semestre = :val1')
            ->setParameter('val1',$semestre)
            ->andWhere('n.anneUniversitaire = :val2')
            ->setParameter('val2',$au)
            ->andWhere('n.isRatrapage = :val3')
            ->setParameter('val3',$ratrapage)
            ->orderBy('e.nom','ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByNiveauxBySemestreEC($niveaux,$semestre,$au,$ratrapage)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.EC','e')
            ->addSelect('e')
            ->where('n.niveaux = :val')
            ->setParameter('val',$niveaux)
            ->andWhere('n.semestre = :val1')
            ->setParameter('val1',$semestre)
            ->andWhere('n.anneUniversitaire = :val2')
            ->setParameter('val2',$au)
            ->andWhere('n.isRatrapage = :val3')
            ->setParameter('val3',$ratrapage)
            ->orderBy('e.nom','ASC')
            ->getQuery()
            ->getResult();
    }

    public function specialFindOne($niveaux,$semestre,$au,$nom,$ec,$ratrapage)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.etudiant','e','WITH','e.nom = :val1')
            ->setParameter('val1',$nom)
            ->addSelect('e')
            ->innerJoin('n.EC','ec','WITH','ec.nom = :val2')
            ->setParameter('val2',$ec)
            ->addSelect('ec')
            ->where('n.niveaux = :val3')
            ->setParameter('val3',$niveaux)
            ->andWhere('n.semestre = :val4')
            ->setParameter('val4',$semestre)
            ->andWhere('n.anneUniversitaire = :val5')
            ->setParameter('val5',$au)
            ->andWhere('n.isRatrapage = :val6')
            ->setParameter('val6',$ratrapage)
            ->getQuery()
            ->getResult();
    }

    public function specialFindOne2($niveaux,$semestre,$au,$id,$ec,$ratrapage)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.etudiant','e','WITH','e.id = :val1')
            ->setParameter('val1',$id)
            ->addSelect('e')
            ->innerJoin('n.EC','ec','WITH','ec.nom = :val2')
            ->setParameter('val2',$ec)
            ->addSelect('ec')
            ->where('n.niveaux = :val3')
            ->setParameter('val3',$niveaux)
            ->andWhere('n.semestre = :val4')
            ->setParameter('val4',$semestre)
            ->andWhere('n.anneUniversitaire = :val5')
            ->setParameter('val5',$au)
            ->andWhere('n.isRatrapage = :val6')
            ->setParameter('val6',$ratrapage)
            ->getQuery()
            ->getResult();
    }

    public function findInvalideNote($etudiant,$semestre)
    {
        $valide = 0;
        $ratrapage = 0;
        return $this->createQueryBuilder('n')
            ->where('n.etudiant = :val1')
            ->setParameter('val1',$etudiant)
            ->andWhere('n.semestre = :val2')
            ->setParameter('val2',$semestre)
            ->andWhere('n.isValide = :val3')
            ->setParameter('val3',$valide)
            ->andWhere('n.isRatrapage = :val4')
            ->setParameter('val4',$ratrapage)
            ->getQuery()
            ->getResult();
    }

    public function findInvalideNote2($etudiant,$niveaux)
    {
        $valide = 0;
        $ratrapage = 1;

        return $this->createQueryBuilder('n')
            ->where('n.etudiant = :val1')
            ->setParameter('val1',$etudiant)
            ->andWhere('n.niveaux = :val2')
            ->setParameter('val2',$niveaux)
            ->andWhere('n.isValide = :val3')
            ->setParameter('val3',$valide)
            ->andWhere('n.isRatrapage = :val4')
            ->setParameter('val4',$ratrapage)
            ->getQuery()
            ->getResult();
    }

    public function findByNote($etudiant,$ec,$semestre,$niveau,$au,$ratrapage,$valeur)
    {
        return $this->createQueryBuilder('n')
            ->where('n.etudiant = :val1')
            ->setParameter('val1',$etudiant)
            ->andWhere('n.EC = :val2')
            ->setParameter('val2',$ec)
            ->andWhere('n.semestre = :val3')
            ->setParameter('val3',$semestre)
            ->andWhere('n.valeur = :val4')
            ->setParameter('val4',$valeur)
            ->andWhere('n.isRatrapage = :val5')
            ->setParameter('val5',$ratrapage)
            ->andWhere('n.anneUniversitaire = :val6')
            ->setParameter('val6',$au)
            ->andWhere('n.niveaux = :val7')
            ->setParameter('val7',$niveau)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Note[] Returns an array of Note objects
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
    public function findOneBySomeField($value): ?Note
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
