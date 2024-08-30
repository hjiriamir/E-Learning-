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
use App\Service\Coaching\CoachingService;

use Symfony\Component\HttpFoundation\JsonResponse;


use Symfony\Component\HttpFoundation\Request;
use App\Service\CourseService as ServiceCourseService;
use App\Service\Search\CourseService;
use Symfony\Component\Validator\Constraints\Json;

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

    #[Route('/coursDiscount', name: 'coursDiscount')]
    public function CourseDiscount(ServiceCourseService $coursService,Request $request,CoachingService $coachingService): Response
    {
        $maxDiscount = $request->get('max'); // Récupère la valeur du champ max
        //dd($maxDiscount);
        $minDiscount = $request->get('min'); // Récupère la valeur du champ max
        //dd($minDiscount);

        $contributorsData = $coursService->getContributorsData();
        $coursesData = $coursService->getCoursesDataa($maxDiscount,$minDiscount);
        $categories=$coursService->getCourseCategorie();
        $query = $request->query->get('query', '');
        $coachingData=$coachingService->getCoachingDataa($maxDiscount,$minDiscount);
       // dd($coachingData);

        $CoursCateg4= $coursService->getCourseCategorie4();
        foreach($CoursCateg4 as $categ){
                $ListCoursId=$categ->getIdCateg4();
        }
        
        $subsubcategoryId = $request->query->get('subsubcategoryId');
        $coursFinal= $coursService->getCours($query);
        $subcateg4 = $coursService->getSubCateg4($subsubcategoryId);
       /* if ($request->query->get('ajax')) {
            $content1 = $this->renderView('search/_ContentDiscount.html.twig', [
                'courses' => $coursesData,
            ]);
        
            $content2 = $this->renderView('search/_ContentDiscCoach.html.twig', [
                // vos données ici
                'coachingData' => $coachingData,
            ]);
        
            return new JsonResponse([
                'content' => $content1 . $content2,
            ]);
        }*/
        
        
        if ($request->query->get('ajax')) {
         
        // Rendu des vues partielles
        $content1 = $this->renderView('search/_ContentDiscount.html.twig', [
            'courses' => $coursesData, // Remplacez par vos données de cours
        ]);

        $content2 = $this->renderView('search/_ContentDiscCoach.html.twig', [
            'coachingData' => $coachingData, // Remplacez par vos données de coaching
        ]);

        // Séparateur HTML
        $separator = '----------------------------------------------------------';

        // Création du JSON
        
        /*$response = [
            'content' => $content1 . $separator . $content2,
        ];*/

        // Retour du JSON
        return new JsonResponse(array(
            'content1'=>$content1,
            'content2'=>$content2,
        ));
        //return new JsonResponse($response);
       
    }
        return $this->render('search/coursesDiscount.html.twig', [
            'contributors1' => $contributorsData,
            'courses' => $coursesData,
            'categories'=>$categories,
            'subsubcategoryId' => $subsubcategoryId,
            'ListCoursId' => $ListCoursId,
            'query' => $query,
            'coursFinal' => $coursFinal,
            'subcateg4' => $subcateg4,
            'coachingData' => $coachingData,
        ]);
    }


   /* #[Route('/course_Discount', name: 'course_Discount')]
    public function discount(ServiceCourseService $coursService,Request $request): Response
    {
        $maxDiscount = $request->get('max'); // Récupère la valeur du champ max
        //dd($maxDiscount);
        $contributorsData = $coursService->getContributorsData();
        $coursesData = $coursService->getCoursesDataa($maxDiscount);
        //dd($coursesData);
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
        if ($request->query->get('ajax')) {
            return new JsonResponse([
            'content' => $this->renderView('search/_ContentDiscount.html.twig', [
                    // vos données ici
                'courses' => $coursesData,
            ])
        ]);
    }
        return $this->render('search/CouDisc.html.twig', [
            'contributors1' => $contributorsData,
            'courses' => $coursesData,
            'categories'=>$categories,
            'subsubcategoryId' => $subsubcategoryId,
            'ListCoursId' => $ListCoursId,
            'query' => $query,
            'coursFinal' => $coursFinal,
            'subcateg4' => $subcateg4,
        ]);
    }*/
    #[Route('/coach_Discount', name: 'coach_Discount')]
    public function discountCoach(CoachingService $coachingService,Request $request): Response
    {
       
        
        $coachingData=$coachingService->getCoachingData();
     
        return $this->render('search/CoachDisc.html.twig',[
            'coachingData' => $coachingData,
        ]);
    }

}
