<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CourseService;

class FiltredCoursController extends AbstractController
{
    #[Route('/filtredCours/{id}', name: 'app_filtred_cours')]
    public function index(CourseService $coursService,$id): Response
    {
        $categoryId = $id;
        
        $contributorsData = $coursService->getContributorsData();
        $coursesData = $coursService->getCoursesData();
        $categories4=$coursService->getCourseCategorie4();
        return $this->render('search/courseCategories.html.twig', [
            'contributors1' => $contributorsData,
            'courses' => $coursesData,
            'categories4'=>$categories4,
            'categoryId' => $categoryId,
        ]);
    }
}
