<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Note;
use App\Entity\UC;

class NoteService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function calculate_moyenne($note_uc)
    {
        $coeff_total = 0;
        $total_somme = 0;
        $uc_repository = $this->em->getRepository(UC::class);
        if($note_uc != null)
        {
            foreach($note_uc as $note)
            {
                $uc = $uc_repository->find($note->getUc()->getId());
                $coeff_total = $coeff_total + $uc->getCoefficient();
                $total_somme = $total_somme + $note->getValueCoeff();
            }
        }
        else $coeff_total = 1;
        $moyenne = $total_somme/$coeff_total; 
        return $moyenne;
    }

    public function generateMatriceNote($nomOrd,$ecOrd,$nbrNom,$nbrEc,$niveaux,$semestre,$au,$ratrapage)
    {
        $em = $this->em;

        $noteRepository = $em->getRepository(Note::class);
        if($nomOrd != NULL && $ecOrd != NULL)
        {
            for ($i=0 ; $i<$nbrNom ; $i=$i+1)
            {
                for($j=0; $j<$nbrEc; $j=$j+1)
                {
                    $noteByEcByEtudiant = $noteRepository->specialFindOne($niveaux,$semestre,$au,$nomOrd[$i],$ecOrd[$j],$ratrapage);
                    if(isset($noteByEcByEtudiant['0']))
                    {
                        $matriceNote[$i][$j] = $noteByEcByEtudiant['0']->getValeur();
                    }
                    else
                    {                        
                        if($ratrapage)
                        {
                            $testIfExist = $noteRepository->specialFindOne($niveaux,$semestre,$au,$nomOrd[$i],$ecOrd[$j],!$ratrapage); 
                            if(isset($testIfExist['0']))
                                if (($testIfExist['0']->getValeur()) > 10 )
                                    $matriceNote[$i][$j] ='déja valider'; 
                                else 
                                    $matriceNote[$i][$j] ='pas de note';
                            else
                                $matriceNote[$i][$j] ='pas de note premier session'; 
                        }
                        else
                            $matriceNote[$i][$j] ='pas de note';
                    }
                }
            }
        }
        else
        {
            $matriceNote = NULL;
        }
        return $matriceNote;
    }
}