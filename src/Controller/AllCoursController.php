<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContributorFollowersRepository;
use App\Repository\ContributorRatingRepository;
use App\Repository\CoursNiveauRepository;
use App\Repository\CoursRatingRepository;
use App\Repository\CoursFinalRepository;
use App\Repository\ContributorRepository;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Service\CourseService as ServiceCourseService;
use App\Service\Search\CourseService;

class AllCoursController extends AbstractController
{
    #[Route('/cours_list', name: 'cours_list')]
    public function index(ServiceCourseService $coursService,Request $request): Response
    {
        $contributorsData = $coursService->getContributorsData();
        $coursesData = $coursService->getCoursesData();
        $categories=$coursService->getCourseCategorie();
        $query = $request->query->get('query', '');
        $ListCoursId=[];
        $CoursCateg4= $coursService->getCourseCategorie4();
        foreach($CoursCateg4 as $categ){
                $ListCoursId=$categ->getIdCateg4();
        }
        
        $subsubcategoryId = $request->query->get('subsubcategoryId');
        $coursFinal= $coursService->getCours($query);
        $subcateg4 = $coursService->getSubCateg4($subsubcategoryId);
        return $this->render('search/courses.html.twig', [
            'contributors1' => $contributorsData,
            'courses' => $coursesData,
            'categories'=>$categories,
            'subsubcategoryId' => $subsubcategoryId,
            'ListCoursId' => $ListCoursId,
            'query' => $query,
            'coursFinal' => $coursFinal,
            'subcateg4' => $subcateg4,
        ]);
    }
}
