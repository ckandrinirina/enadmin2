<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use BackupManager\Manager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class BackupController extends AbstractController
{
    /**
     * @Route("/sauvagarde", name="backup")
     * Vous n'avez pas le permission de voir cette page.
     *
     * @IsGranted("ROLE_SUPER_ADMIN")
     */
    public function index()
    {
        $status = 'backup';
        return $this->render('backup/index.html.twig',[
          'status'=>$status
        ]);
    }

    /**
     * @Route("/sauvagarde/actual/database", name="backup_current")
     */
    public function do_backup()
    {
      $this->container->get('backup_manager')->makeBackup()->run('development', [new Destination('s3', 'test/backup.sql')], 'gzip');
      return $this->redirectToRoute('backup');
    }
}
