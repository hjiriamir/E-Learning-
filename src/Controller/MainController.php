<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(/*Request $request*/): Response
    {   // $iduser = $request->getSession()->get('user_id');
        // getUserIdentifier()
        return $this->render('main/index.html.twig',['id'=>1]);
    }
}
