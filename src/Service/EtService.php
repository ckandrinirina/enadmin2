<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\EmploiDuTemps;
use phpDocumentor\Reflection\Types\Null_;

class EtService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function generateMatriceEt($niveaux,$heures,$jours)
    {
        $em = $this->em;
        $nbrJours = count($jours);
        $nbrHeures = count($heures);
        $etRepository = $em->getRepository(EmploiDuTemps::class);

        if($heures != NULL && $jours != NULL)
        {
            for ($i=0 ; $i<$nbrHeures ; $i=$i+1)
            {
                for($j=0; $j<$nbrJours; $j=$j+1)
                {
                    $he = $heures[$i]->getId();
                    $jo = $jours[$j]->getId();
                    $etByNiveauxByHeuresByJours = $etRepository->specialFindOne($niveaux,$he,$jo);
                    if(isset($etByNiveauxByHeuresByJours['0']))
                    {
                        $matriceEt[$i][$j] = $etByNiveauxByHeuresByJours['0']->getEc()->getNom();
                    }
                    else
                    {                        
                        $matriceEt[$i][$j] = null;
                    }
                }
            }
        }
        else
        {
            $matriceEt = NULL;
        }
        dump($matriceEt);
        return $matriceEt;
    }
}