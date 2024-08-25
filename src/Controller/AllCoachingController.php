<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Coaching\CoachingService;


class AllCoachingController extends AbstractController
{
   /* #[Route('/coaching_list', name: 'coaching_list')]
    public function index(): Response
    {
        return $this->render('search/coaching.html.twig', [
            'controller_name' => 'AllCoachingController',
        ]);
    }*/
    #[Route('/coaching_list', name: 'coaching_list')]
    public function index(CoachingService $coachingService,Request $request): Response
    {
        

        $coachingData=$coachingService->getCoachingData();
        $ListCoachId=[];
        $CoachCateg4= $coachingService->getCoachingCategorie4();
        foreach($CoachCateg4 as $categ){
                $ListCoachId=$categ->getIdCateg4();
        }
        $query = $request->query->get('query', '');
        $searchedCoachings = $coachingService->getCoachings($query);
        $subsubcategoryId = $request->query->get('subsubcategoryId');
        $subcateg4 = $coachingService->getSubCateg4($subsubcategoryId);
        return $this->render('search/coaching.html.twig', [
            'coachingData' => $coachingData,
            'subsubcategoryId' => $subsubcategoryId,
            'ListCoachId' => $ListCoachId,
            'searchedCoachings' => $searchedCoachings,
            'query' => $query,
            'subcateg4' => $subcateg4,
          
        ]);
    }
}
