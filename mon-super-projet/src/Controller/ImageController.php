<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    #[Route('/image', name: 'images')]
    public function index(): Response
    {

        return $this->render('image/images.html.twig', [
            'controller_name' => 'ImageController',
            'tabImg'=>$this->getAllImage()
        ]);
    }

    private function getAllImage(){
        $tabImage = [];
        array_push($tabImage, "arc", "epee", "hache");

        $dir    = 'C:\wamp64\www\PHP\liste-projet\mon-super-projet\public\images';
        $files1 = scandir($dir);
        var_dump($files1);


        return $tabImage;
    }
}
