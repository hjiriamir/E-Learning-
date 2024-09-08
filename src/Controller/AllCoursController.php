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

use App\Repository\CoursCategorieRepository;
use App\Repository\CoursLanguageRepository;


use Symfony\Component\HttpFoundation\Request;
use App\Service\CourseService as ServiceCourseService;
use App\Service\Search\CourseService;
use Symfony\Component\Validator\Constraints\Json;

class AllCoursController extends AbstractController
{
    private $coursNiveauRepository;
    private $coursCategorieRepository;
    private $coursLanguageRepository;
    public function __construct(CoursNiveauRepository $coursNiveauRepository,CoursCategorieRepository $coursCategorieRepository,CoursLanguageRepository $coursLanguageRepository)
    {
   
        $this->coursNiveauRepository = $coursNiveauRepository;
        $this->coursCategorieRepository = $coursCategorieRepository;
        $this->coursLanguageRepository = $coursLanguageRepository;
        
    }

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

         //Récuperation du barre de filtrage 
         $levels9 =$this->coursNiveauRepository->findAll();
         $categorys = $this->coursCategorieRepository->findAll();
         $languages = $this->coursLanguageRepository->findAll();
 
         $filters = $request->get('levels8');
         //dd($filters);
 
         $Filterslanguage = $request->get('lang8');
         //dd($languages);
 
         $FiltersCategorys = $request->get('categs8');
         //dd($languages);
         $durations = $request->get('durations', []);
          // Récupérer les valeurs des prix
         $minPrice = $request->get('min1'); // Récupère la valeur du champ min
         
         $maxPrice = $request->get('max1'); // Récupère la valeur du champ max
        // dd($maxPrice);
        $durMin = null;
        $durMax = null;
        
        if (in_array('15--30', $durations)) {
            $durMin = 15;
            $durMax = 30;
        } elseif (in_array('30-1h', $durations)) {
            $durMin = 31;
            $durMax = 60;
        } elseif (in_array('Sup_1h2', $durations)) {
            $durMin = 61;
            $durMax = 10000;
        } 
        $durations = $request->get('durations', []);

        $minPriceDisc = $request->get('min0'); // Récupère la valeur du champ min
       
        $maxPriceDisc = $request->get('max0');
       // dd($maxPriceDisc);
        $maxDiscount = $request->get('max1'); // Récupère la valeur du champ max
        //dd($maxDiscount);
        $minDiscount = $request->get('min1'); // Récupère la valeur du champ max
        //dd($minDiscount);

       /* $contributorsData = $coursService->getContributorsData();
        $coursesData = $coursService->getCoursesDataa($maxDiscount,$minDiscount);
        
        
        $coachingData=$coachingService->getCoachingDataa($maxDiscount,$minDiscount);*/
       // dd($coachingData);
       $categories=$coursService->getCourseCategorie();
       $contributorsData = $coursService->getContributorsData($Filterslanguage,$filters,$FiltersCategorys, $maxPriceDisc,$minPriceDisc);
        // on recupere les courses en fonction du filtre
        $coursesData = $coursService->getFiltredCourses($filters,$Filterslanguage,$FiltersCategorys, $maxPriceDisc,$minPriceDisc,$durMin,$durMax, $minDiscount,$maxDiscount); 
       // dd($coursesData);
       // $coachingData=$coachingService->getCoachingDataaa($Filterslanguage,$filters,$FiltersCategorys, $minPrice,$maxPrice,$durMin,$durMax,$maxDiscount,$minDiscount, $maxPriceDisc,$minPriceDisc);

        $coachingData=$coachingService->getCoachingDataa($filters,$Filterslanguage,$FiltersCategorys, $maxPriceDisc,$minPriceDisc,$durMin,$durMax, $maxDiscount,$minDiscount);

        $CoursCateg4= $coursService->getCourseCategorie4();
        foreach($CoursCateg4 as $categ){
                $ListCoursId=$categ->getIdCateg4();
        }
        
        $subsubcategoryId = $request->query->get('subsubcategoryId');
        $query = $request->query->get('query', '');
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
       
        $coursFinal= $coursService->getCours($query);
        $contributorFinal= $coursService->getContributors($query);
        $searchedCoachings = $coachingService->getCoachings($query);

        $categories=$coursService->getCourseCategorie();
        $categories2=$coursService->getCourseCategorie2();
        $categories3=$coursService->getCourseCategorie3();
        $categories4=$coursService->getCourseCategorie4();

        $coachCategorie=$coachingService->getCoachingCategorie();
        $coachCategorie2=$coachingService->getCoachingCategorie2();
        $coachCategorie3=$coachingService->getCoachingCategorie3();
        $coachCategorie4=$coachingService->getCoachingCategorie4();


        $vale="English";
        $minPrice1 = $request->request->get('min');
        $maxPrice1 = $request->request->get('max');

        $minPrice1Coach = $request->request->get('min');
        $maxPrice1Coach = $request->request->get('max');
        
        if ($request->query->get('ajax')) {
         
        // Rendu des vues partielles
        $content1 = $this->renderView('search/_ContentDiscount.html.twig', [
           // 'courses' => $coursesData, // Remplacez par vos données de cours
           'courses' => $coursesData,          
           'levels9' => $levels9,
           'filters' => $filters,
           'categorys' => $categorys,
           'languages' => $languages,
           'Filterslanguage' => $Filterslanguage,
           'FiltersCategorys' => $FiltersCategorys,
        ]);

        $content2 = $this->renderView('search/_ContentDiscCoach.html.twig', [
            //'coachingData' => $coachingData, // Remplacez par vos données de coaching
            'coachingData' => $coachingData,
            'levels9' => $levels9,
            'filters' => $filters,
            'categorys' => $categorys,
            'languages' => $languages,
            'Filterslanguage' => $Filterslanguage,
            'FiltersCategorys' => $FiltersCategorys,
        ]);

      

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
        return $this->render('search/CoursesDiscount.html.twig', [
            'contributors1' => $contributorsData,
            'courses' => $coursesData,
            'categories'=>$categories,
            'subsubcategoryId' => $subsubcategoryId,
            'ListCoursId' => $ListCoursId,
            'query' => $query,
            'coursFinal' => $coursFinal,
            'subcateg4' => $subcateg4,
            'coachingData' => $coachingData,
            'levels9' => $levels9,
            'filters' => $filters,
            'categorys' => $categorys,
            'languages' => $languages,
            'Filterslanguage' => $Filterslanguage,
            'FiltersCategorys' => $FiltersCategorys,
        ]);
    }


   





    #[Route('/coach_Discount', name: 'coach_Discount')]
    public function discountCoach(CoachingService $coachingService,Request $request): Response
    {
       
        
        $coachingData=$coachingService->getCoachingData();
     
        return $this->render('search/CoachDisc.html.twig',[
            'coachingData' => $coachingData,
        ]);
    }

}
