<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursFinalRepository;
use App\Service\Coaching\CoachingService;

use App\Repository\ContributorRepository;
use App\Repository\UsersRepository;
use App\Repository\ContributorFollowersRepository;
use App\Repository\ContributorRatingRepository;
use App\Repository\CoursNiveauRepository;
use App\Repository\CoursRatingRepository;
use App\Service\CourseService as ServiceCourseService;
use App\Service\Search\CourseService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request; 
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Psr\Log\LoggerInterface;
use App\Repository\CoursCategorieRepository;
use App\Repository\CoursLanguageRepository;


class AllInstructorsController extends AbstractController
{
    private $session;
    private $sessionn;
    private $session1;
    private $session2;
    private $session3;
    private $session4;
    private $session5;
    private $session6;
    private $session7;
    private $session8;
    private $session9;
    private $coursNiveauRepository;
    private $coursCategorieRepository;
    private $coursLanguageRepository;

    public function __construct(RequestStack $requestStack,CoursNiveauRepository $coursNiveauRepository,CoursCategorieRepository $coursCategorieRepository,CoursLanguageRepository $coursLanguageRepository)
    {
        $this->session = $requestStack->getSession();
        $this->sessionn = $requestStack->getSession();
        $this->session1 = $requestStack->getSession();
        $this->session2 = $requestStack->getSession();
        $this->session3 = $requestStack->getSession();
        $this->session4 = $requestStack->getSession();
        $this->session5 = $requestStack->getSession();
        $this->session6 = $requestStack->getSession();
        $this->session7 = $requestStack->getSession();
        $this->session8 = $requestStack->getSession();
        $this->session9 = $requestStack->getSession();
        $this->coursNiveauRepository = $coursNiveauRepository;
        $this->coursCategorieRepository = $coursCategorieRepository;
        $this->coursLanguageRepository = $coursLanguageRepository;
        
    }
   
    #[Route('/allinstructors', name: 'allinstructors')]
    public function index(ServiceCourseService $coursService, Request $request): Response
    {
        $query = $request->query->get('query', '');
        $contributorFinal= $coursService->getContributors($query);
        $contributorsData = $coursService->getContributorsData();
        $coursesData = $coursService->getCoursesData();
        $search2=0;

        if (!empty($contributorsData)) {
            $content1 = $this->renderView('search/_ContentInstructors.html.twig', [
                'contributors1' => $contributorsData,
                'courses' => $coursesData,
                'query' => $query,
                'contributorFinal' => $contributorFinal,
                'search2' => $search2,

             ]);
        }
    
        return $this->render('search/instructors.html.twig', [
            'contributors1' => $contributorsData,
            'courses' => $coursesData,
            'query' => $query,
            'contributorFinal' => $contributorFinal,
        ]);
    }
   /* #[Route('/allinstructors1', name: 'allinstructors')]
    public function index1(): Response
    {
        return $this->render('search/New.html.twig', [
            
        ]);
    }*/
    #[Route('/allinstructors1', name: 'allinstructors1')]
    public function index1( SessionInterface $session,Request $request,ServiceCourseService $coursService,CoachingService $coachingService): Response
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

         // Récupérer les valeurs des prix
        $minPrice = $request->get('min'); // Récupère la valeur du champ min
        
        $maxPrice = $request->get('max'); // Récupère la valeur du champ max
       // dd($maxPrice);
      
       $durations = $request->get('durations', []);
       $contentss = $request->get('durat', []);
     
       
       // Vérification des valeurs de $durations et définition des variables en fonction de celles-ci
    // Initialisation des valeurs par défaut
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
            // Récupérer le mot à chercher
            $searchQuery = $request->query->get('query');
           // dd($searchQuery);
       //dd($durMin,$durMax);
       //dd($durations);

       // Afficher les valeurs récupérées pour le débogage
      // dump($durations); 
    
      
        $contributorsData = $coursService->getContributorsData($Filterslanguage,$filters,$FiltersCategorys, $minPrice,$maxPrice);
        // on recupere les courses en fonction du filtre
        $coursesData = $coursService->getCoursesData($filters,$Filterslanguage,$FiltersCategorys, $minPrice,$maxPrice,$durMin,$durMax); 
       // dd($coursesData);
        $coachingData=$coachingService->getCoachingDataaa($Filterslanguage,$filters,$FiltersCategorys, $minPrice,$maxPrice,$durMin,$durMax);
       // $session->set('coachingData', $coachingData);
       //dd($coachingData);
       // $this->sessionn->set('coachingData', $coachingData);
       //$contentCours=$coursService->getCoursContents(cours);
       
        $query = $request->query->get('query', '');
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


       // $data = $this->getData();
        $vale="English";
        $minPrice1 = $request->request->get('min');
        $maxPrice1 = $request->request->get('max');

        $minPrice1Coach = $request->request->get('min');
        $maxPrice1Coach = $request->request->get('max');

        
        //************************************* */
          // On vérifie si on a une requête Ajax
          if ($request->query->get('ajax')) {
            // Rendre le premier fichier Twig
            $content1 = $this->renderView('search/ContentPag.html.twig', [
                'contributors1' => $contributorsData,
                'coursess' => $coursesData,
                'coachingData' => $coachingData,
                'query' => $query,
                'coursFinal' => $coursFinal,
                'contributorFinal' => $contributorFinal,
                'searchedCoachings' => $searchedCoachings,
                
                // Récupérer les catégories et sous-catégories des cours :
                'categories' => $categories,
                'categories2' => $categories2,
                'categories3' => $categories3,
                'categories4' => $categories4,
        
                // Récupérer les catégories et sous-catégories de coaching :
                'coachCategorie' => $coachCategorie,
                'coachCategorie2' => $coachCategorie2,
                'coachCategorie3' => $coachCategorie3,
                'coachCategorie4' => $coachCategorie4,
                'vale' => $vale,
                'minPrice1' => $minPrice1,
                'maxPrice1' => $maxPrice1,
        
                'minPrice1Coach' => $minPrice1Coach,
                'maxPrice1Coach' => $maxPrice1Coach,
                'levels9' => $levels9,
                'filters' => $filters,
                'categorys' => $categorys,
                'languages' => $languages,
                'Filterslanguage' => $Filterslanguage,
                'FiltersCategorys' => $FiltersCategorys,
            ]);
        
            // Rendre le deuxième fichier Twig
            $content2 = $this->renderView('search/_contentCoach.html.twig', [
                'contributors1' => $contributorsData,
                'coursess' => $coursesData,
                'coachingData' => $coachingData,
                'query' => $query,
                'coursFinal' => $coursFinal,
                'contributorFinal' => $contributorFinal,
                'searchedCoachings' => $searchedCoachings,
            ]);
        
            // Retourner la réponse JSON avec les deux contenus
            return new JsonResponse([
                'content1' => $content1,
                'content2' => $content2,
            ]);
        }
        
        // Si ce n'est pas une requête AJAX, rendre la vue complète
        return $this->render('search/New.html.twig', [
            'contributors1' => $contributorsData,
            'coursess' => $coursesData,
            'coachingData' => $coachingData,
            'query' => $query,
            'coursFinal' => $coursFinal,
            'contributorFinal' => $contributorFinal,
            'searchedCoachings' => $searchedCoachings,
        
            // Récupérer les catégories et sous-catégories des cours :
            'categories' => $categories,
            'categories2' => $categories2,
            'categories3' => $categories3,
            'categories4' => $categories4,
        
            // Récupérer les catégories et sous-catégories de coaching :
            'coachCategorie' => $coachCategorie,
            'coachCategorie2' => $coachCategorie2,
            'coachCategorie3' => $coachCategorie3,
            'coachCategorie4' => $coachCategorie4,
            'vale' => $vale,
            'minPrice1' => $minPrice1,
            'maxPrice1' => $maxPrice1,
        
            'minPrice1Coach' => $minPrice1Coach,
            'maxPrice1Coach' => $maxPrice1Coach,
            'levels9' => $levels9,
            'filters' => $filters,
            'categorys' => $categorys,
            'languages' => $languages,
            'Filterslanguage' => $Filterslanguage,
            'FiltersCategorys' => $FiltersCategorys,
        ]);
        
    }


}