<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursFinalRepository;
use App\Repository\ContributorRepository;
use App\Repository\UsersRepository;
use App\Repository\ContributorFollowersRepository;
use App\Repository\ContributorRatingRepository;
use App\Repository\CoursNiveauRepository;
use App\Repository\CoursRatingRepository;
use App\Service\CourseService as ServiceCourseService;
use App\Service\Search\CourseService;
use Symfony\Component\HttpFoundation\Request;

class AllInstructorsController extends AbstractController
{
    #[Route('/allinstructors', name: 'allinstructors')]
    public function index(ServiceCourseService $coursService, Request $request): Response
    {
        $query = $request->query->get('query', '');
        $contributorFinal= $coursService->getContributors($query);
        $contributorsData = $coursService->getContributorsData();
        $coursesData = $coursService->getCoursesData();
    
        return $this->render('search/instructors.html.twig', [
            'contributors1' => $contributorsData,
            'courses' => $coursesData,
            'query' => $query,
            'contributorFinal' => $contributorFinal,
        ]);
    }


}