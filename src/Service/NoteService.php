<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Note;

class NoteService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
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