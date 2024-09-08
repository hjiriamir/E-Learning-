<?php

namespace App\Controller;

use App\Entity\CoursFinal;
use App\Service\Coaching\CoachingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request; 
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Psr\Log\LoggerInterface;
use App\Service\CourseService as ServiceCourseService;
use App\Repository\CoursNiveauRepository;
use App\Repository\CoursCategorieRepository;
use App\Repository\CoursLanguageRepository;


class CoursController extends AbstractController
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
   


    #[Route('/course', name: 'course')]
    public function index( SessionInterface $session,Request $request,ServiceCourseService $coursService,CoachingService $coachingService): Response
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


        $data = $this->getData();
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
                'data' => $data,
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
        return $this->render('search/search2.html.twig', [
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
            'data' => $data,
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
    /*#[Route('/coachingdata', name: 'coachingdata', methods: ['POST'])]
    public function coachingdata(Request $request): Response{
        $selectedcoachingData = $this->sessionn->get('coachingData', 'default_values');
        if ($request->query->get('ajax')) {
            return new JsonResponse([
            'content' => $this->renderView('search/_contentCoach.html.twig', [
                    // vos données ici
         
            'coachingData'=>$selectedcoachingData,
            ])
            ]);
        }}*/
        


    #[Route('/handle_levels_selection', name: 'handle_levels_selection', methods: ['POST'])]
    public function handleLevelsSelection(Request $request, SessionInterface $session): JsonResponse
    {
        // Assurer que la variable $selectedLevels est un tableau
        $selectedLevels = (array) $request->request->get('level', []);
    
        if (empty($selectedLevels)) {
            $session->remove('selected_level');
        } else {
            $session->set('selected_level', implode(', ', $selectedLevels));
        }
    
        return new JsonResponse(['message' => 'Levels selected: ' . implode(', ', $selectedLevels)]);
    }
    


    #[Route('/cours2', name: 'courseContents')]
    public function showCourseContents(CoachingService $coachingService): Response
    {
        $contents = $coachingService->Test();

        return $this->render('search/header.html.twig',[
            'contents' => $contents,
        ]);
    }
    /* Partie du Controller consacrer a la section Courses */ 

   #[Route('/handle_language_selection', name: 'handle_language_selection', methods: ['POST'])]
    public function handleLanguageSelection(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $language = $data['language'] ?? '';

        if ($language === '') {
            $this->session->remove('selected_language');
        } else {
            $this->session->set('selected_language', $language);
        }

        // Debugging
        error_log('Selected Language: ' . $language); // Log dans les fichiers de log de Symfony

        return new JsonResponse(['message' => 'Language selected: ' . $language]);
    }
    #[Route('/handle_level_selection', name: 'handle_level_selection', methods: ['POST'])]
    public function handleLevelSelection(Request $request, SessionInterface $session1): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $levels = $data['levels'] ?? '';

        // Stocker les niveaux sélectionnés dans la session
        $session1->set('global_status', $levels);

        return new JsonResponse(['message' => 'Global status updated', 'global_status' => $levels]);
    }
    
    #[Route('/handle_product_selection', name: 'handle_product_selection', methods: ['POST'])]
    public function handleProductSelection(Request $request, SessionInterface $session4): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $products = $data['products'] ?? '';

        // Stocker les niveaux sélectionnés dans la session
        $session4->set('global_status1', $products);

        return new JsonResponse(['message' => 'Global status updated', 'global_status1' => $products]);
    }

    private function getData(): array
    {
        $selectedLanguage = $this->session->get('selected_language', 'default_value');
        $selectedLevel = $this->session1->get('global_status', 'default_values');
        $selectedCategoryy = $this->session2->get('selected_category', 'default_values');

        $minPrice = $this->session3->get('min', 0);
        $maxPrice = $this->session3->get('max', 0);
        $selectedProduct = $this->session4->get('global_status1', 'default_values');

        $selectedDuration = $this->session8->get('selected-duration', 'default_value');
        /* Coaching 1 to 1*/ 
        $selectedCategoryCoach = $this->session5->get('selected_categoryCoach', 'default_values');
        $selectedLevelCoach = $this->session6->get('global_status', 'default_values');
        $selectedCoachLanguage = $this->session->get('selected_languageCoach', 'default_value');
        $selectedDurationCoach = $this->session9->get('selected-duration1', 'default_value');

        return [
            "val" => "English",
            "val1" => "hjiri",
            "selectedLanguage" => $selectedLanguage,
            "selectedLevel" => $selectedLevel,
            "selectedCategoryy" => $selectedCategoryy,
            "minPrice" => $minPrice,
            "maxPrice" => $maxPrice,
            "selectedProduct" => $selectedProduct,
            "selectedCategoryCoach" => $selectedCategoryCoach,
            "selectedLevelCoach" => $selectedLevelCoach,
            "selectedCoachLanguage" => $selectedCoachLanguage,
            "selectedDuration" => $selectedDuration,
            "selectedDurationCoach" => $selectedDurationCoach,
           
           
        ];
    }
    #[Route('/fetch_selected_language', name: 'fetch_selected_language', methods: ['GET'])]
    public function fetchSelectedLanguage(Request $request): JsonResponse
    {
        $selectedLanguage = $this->session->get('selected_language', 'default_value');

        return new JsonResponse([
            'selectedLanguage' => $selectedLanguage,
            'val1' => 'some_value_based_on_language' // ou tout autre contenu conditionnel
        ]);
    }
    #[Route('/fetch_selected_category', name: 'fetch_selected_category')]
    public function fetchSelectedCategory(): JsonResponse
    {
        $selectedCategory = $this->session->get('selected_category', 'all_category');
        return new JsonResponse(['selectedCategoryy' => $selectedCategory]);
    }
 
                  
    #[Route('/handle_category_selection', name: 'handle_category_selection', methods: ['POST'])]
    public function handleCategorySelection(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $category = $data['category'] ?? 'all_category';
        $this->session2->set('selected_category', $category);
        return new JsonResponse(['message' => 'Category selected: ' . $category]);
    }

    #[Route('/update_price', name: 'update_price', methods: ['POST'])]
    public function updatePrice(Request $request, SessionInterface $session): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $minPrice = $data['min_price'] ?? 0;
        $maxPrice = $data['max_price'] ?? 0;

        // Stocker les valeurs dans la session
        $session->set('min_price', $minPrice);
        $session->set('max_price', $maxPrice);

        // Débogage : vérifiez que les valeurs sont bien stockées
        error_log("Min Price: $minPrice, Max Price: $maxPrice");

        return new JsonResponse(['message' => 'Price range updated', 'min_price' => $minPrice, 'max_price' => $maxPrice]);
    }
    #[Route('/handle_price_range', name: 'handle_price_range', methods: ['POST'])]
    public function handlePriceRange(Request $request, SessionInterface $session): JsonResponse
    {
        $minPrice1 = $request->request->get('min');
        $maxPrice1 = $request->request->get('max');

        // Stocker les valeurs dans la session
        $session->set('minPrice', $minPrice1);
        $session->set('maxPrice', $maxPrice1);

        // Retourner une JsonResponse avec les valeurs stockées
        return new JsonResponse([
            'minPrice1' => $minPrice1,
            'maxPrice1' => $maxPrice1,
        ]);
    }

    #[Route('/fetch_selected_duration', name: 'fetch_selected_duration', methods: ['GET'])]
    public function fetchSelectedDuration(Request $request): JsonResponse
    {
        $selectedDuration = $this->session8->get('selected-duration', 'default_value');

        return new JsonResponse([
            'selectedDuration' => $selectedDuration,
            'val1' => 'some_value_based_on_duration' // ou tout autre contenu conditionnel
        ]);
    }

    #[Route('/handle_duration_selection', name: 'handle_duration_selection', methods: ['POST'])]
    public function handleDurationSelection(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $duration = $data['duration'] ?? '';

        if ($duration === '') {
            $this->session8->remove('selected-duration');
        } else {
            $this->session8->set('selected-duration', $duration);
        }

        // Debugging
        error_log('Selected Duration: ' . $duration); // Log dans les fichiers de log de Symfony

        return new JsonResponse(['message' => 'Duration selected: ' . $duration]);
    }

/* Partie du Controller consacrer a la section Coaching*/ 
#[Route('/fetch_selected_categoryCoach', name: 'fetch_selected_categoryCoach')]
public function fetchSelectedCategoryCoach(): JsonResponse
{
    $selectedCategoryCoach = $this->session->get('selected_categoryCoach', 'all_category');
    return new JsonResponse(['selectedCategoryCoach' => $selectedCategoryCoach]);
}

#[Route('/handle_categoryCoach_selection', name: 'handle_categoryCoach_selection', methods: ['POST'])]
    public function handleCategoryCoachSelection(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $categoryCoach = $data['categoryCoach'] ?? 'all_categoryCoach';
        $this->session5->set('selected_categoryCoach', $categoryCoach);
        return new JsonResponse(['message' => 'Category selected: ' . $categoryCoach]);
    }

    #[Route('/handle_levelCoach_selection', name: 'handle_levelCoach_selection', methods: ['POST'])]
    public function handleLevelCoachSelection(Request $request, SessionInterface $session6): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $levelsCoach = $data['levelsCoach'] ?? '';

        // Stocker les niveaux sélectionnés dans la session
        $session6->set('global_status', $levelsCoach);

        return new JsonResponse(['message' => 'Global status updated', 'global_status' => $levelsCoach]);
    }
    #[Route('/fetch_selected_languageCoach', name: 'fetch_selected_languageCoach', methods: ['GET'])]
    public function fetchSelectedLanguageCoach(Request $request): JsonResponse
    {
        $selectedLanguageCoach = $this->session7->get('selected_languageCoach', 'default_value');

        return new JsonResponse([
            'selectedLanguageCoach' => $selectedLanguageCoach,
            'val1' => 'some_value_based_on_language' // ou tout autre contenu conditionnel
        ]);
    }

    #[Route('/handle_languageCoach_selection', name: 'handle_languageCoach_selection', methods: ['POST'])]
    public function handleLanguageCoachSelection(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $languagecoach = $data['languagecoach'] ?? '';

        if ($languagecoach === '') {
            $this->session7->remove('selected_language');
        } else {
            $this->session7->set('selected_languageCoach', $languagecoach);
        }

        // Debugging
        error_log('Selected Language: ' . $languagecoach); // Log dans les fichiers de log de Symfony

        return new JsonResponse(['message' => 'Language selected: ' . $languagecoach]);
    }


    //duration coaching 
    #[Route('/fetch_selected_durationCoach', name: 'fetch_selected_durationCoach', methods: ['GET'])]
    public function fetchSelectedDurationCoach(Request $request): JsonResponse
    {
        $selectedDurationCoach = $this->session9->get('selected-duration', 'default_value');

        return new JsonResponse([
            'selectedDurationCoach' => $selectedDurationCoach,
            'val1' => 'some_value_based_on_duration' // ou tout autre contenu conditionnel
        ]);
    }

    #[Route('/handle_durationCoach_selection', name: 'handle_durationCoach_selection', methods: ['POST'])]
    public function handleDurationCoachSelection(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $duration = $data['duration'] ?? '';

        if ($duration === '') {
            $this->session9->remove('selected-duration');
        } else {
            $this->session9->set('selected-duration1', $duration);
        }

        // Debugging
        error_log('Selected Duration: ' . $duration); // Log dans les fichiers de log de Symfony

        return new JsonResponse(['message' => 'Duration selected: ' . $duration]);
    }

}