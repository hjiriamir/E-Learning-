<?php
namespace App\Service\Coaching;

use App\Repository\ContributorFollowersRepository;
use App\Repository\ContributorRatingRepository;
use App\Repository\ContributorRepository;
use App\Repository\CoursNiveauRepository;
use App\Repository\CoursRatingRepository;
use App\Repository\CoursFinalRepository;
use App\Repository\UsersRepository;
use App\Repository\CoachingCategorie2Repository;
use App\Repository\CoachingCategorieRepository;
use App\Repository\CoachingCategorie3Repository;
use App\Repository\CoachingCategorie4Repository;
use App\Repository\CoachingRepository;
use App\Repository\CoachingNiveauRepository;
use App\Repository\CoachingRatingRepository;
use App\Repository\CoachRepository;
use App\Repository\CoachingLanguesRepository;
use App\Repository\CoachingStepRepository;
use App\Repository\CoachingStepContentRepository;

use Symfony\Component\HttpFoundation\Response;

class CoachingService
{
    private $coursRepository;
    private $contributorRepository;
    private $usersRepository;
    private $contributorFollowersRepository;
    private $contributorRatingRepository;
    private $coursNiveauRepository;
    private $coursRatingRepository;
    private $coachingRepository;
    private $coaching2Repository;
    private $coaching3Repository;
    private $coaching4Repository;

    private $coachingNiveauRepository;
    private $coachingRatingRepository;
    private $coaching0Repository;

    private $coachRepository;
    private $coachingLangueRepository;
    private $coachingStepRepository;
    private $coachingStepContentRepository;


    public function __construct(
        CoursFinalRepository $coursRepository,
        ContributorRepository $contributorRepository,
        UsersRepository $usersRepository,
        ContributorFollowersRepository $contributorFollowersRepository,
        ContributorRatingRepository $contributorRatingRepository,
        CoursNiveauRepository $coursNiveauRepository,
        CoursRatingRepository $coursRatingRepository,
        CoachingCategorie4Repository $coachingCategorie4Repository,
        CoachingCategorie3Repository $coachingCategorie3Repository,
        CoachingCategorie2Repository $coachingCategorie2Repository,
        CoachingCategorieRepository $coachingCategorieRepository,
        CoachingRepository $coaching0Repository,

        CoachingNiveauRepository $coachingNiveauRepository,
        CoachingRatingRepository $coachingRatingRepository,

        CoachRepository $coachRepository,
        CoachingLanguesRepository $coachingLangueRepository,
        CoachingStepRepository $coachingStepRepository,
        CoachingStepContentRepository $coachingStepContentRepository,
     
        
    ) {
        $this->coursRepository = $coursRepository;
        $this->contributorRepository = $contributorRepository;
        $this->usersRepository = $usersRepository;
        $this->contributorFollowersRepository = $contributorFollowersRepository;
        $this->contributorRatingRepository = $contributorRatingRepository;
        $this->coursNiveauRepository = $coursNiveauRepository;
        $this->coursRatingRepository = $coursRatingRepository;
        $this->coaching0Repository = $coachingCategorieRepository;
        $this->coaching2Repository = $coachingCategorie2Repository;
        $this->coaching3Repository = $coachingCategorie3Repository;
        $this->coaching4Repository = $coachingCategorie4Repository;

        $this->coachingRepository = $coaching0Repository;
        $this->coachingNiveauRepository = $coachingNiveauRepository;
        $this->coachingRatingRepository = $coachingRatingRepository;
        $this->coachRepository = $coachRepository;
        $this->coachingLangueRepository = $coachingLangueRepository;
        $this->coachingStepRepository = $coachingStepRepository;
        $this->coachingStepContentRepository = $coachingStepContentRepository;
     
    }
    public function getCoachingCategorie(){
        $categories = $this->coaching0Repository->findAll();
        return $categories;
     }
     public function getCoachingCategorie2(){
        $categories = $this->coaching2Repository->findAll();
        return $categories ;
    }
    public function getCoachingCategorie3(){
        $categories = $this->coaching3Repository->findAll();
        return $categories ;
    }
    public function getCoachingCategorie4(){
        $categories = $this->coaching4Repository->findAll();
        return $categories ;
    }

    public function getCoachingData($minPrice = null, $maxPrice = null)
    {
        $coachings=$this->coachRepository->findAll();

        if ($minPrice !== null && $maxPrice !== null) {
            $filteredcoachings = array_filter($coachings, function($cour) use ($minPrice, $maxPrice) {
                return ($cour->getPrix() >= $minPrice) && ($cour->getPrix() <= $maxPrice);
            });
            $coachings = $filteredcoachings;
        }

        $coachingsData = [];
        $allCategories = [];
        $contents = [];
        foreach ($coachings as $course) {
            $contents = [];
            $AllCoachSteps= $this->coachingStepRepository->findAll();
            $AllcoachContents= $this->coachingStepContentRepository->findAll();
            foreach($AllCoachSteps as $coach){
                if($coach->getIdCoaching() == $course->getId()){
                    foreach($AllcoachContents as $content){
                        if($content->getIdStep() == $coach->getIdStep()){
                            $contents[] = $content;
                        }
                    }

                }

            }
            $contributor = $this->contributorRepository->find($course->getIdContributor());
            $user = $this->usersRepository->find($contributor ? $contributor->getIdUser() : null);
            $ratings = $this->coachingRatingRepository->countByIdUser($user ? $user->getId() : null);
            $followers = $this->contributorFollowersRepository->count(['idContributor' => $contributor ? $contributor->getId() : null]);
            $coachCateg4=$course->getSousCategorie4();
            $idsArray = explode(',', $coachCateg4);

            // Convertir chaque élément en entier
            $idsArray = array_map('intval', $idsArray);
            $allCategories[] = $idsArray;

           // $coachNiveauId = $course->getLevel();
           $coachNiveauId = (int) $course->getLevel();
 
           $coachNiveau = $coachNiveauId ? $this->coachingNiveauRepository->find($coachNiveauId) : null;
           $label1 = $coachNiveau ? $coachNiveau->getLabel() : null;
       
            $coachingsData[] = [
                'course' => $course,
                'contributor' => $contributor,
                'user' => $user,
                'userImage' => $user ? $user->getPhoto() : null,
                'ratings' => $ratings,
                'coachNiveau' => $coachNiveau,
                'label1' => $label1,
                'followers'=>$followers,
                'idsArray'=>$idsArray,
                'allCategories'=>$allCategories,
                'contents' => $contents,
            ];
        }

        return $coachingsData;
    }
    public function getCoachingDataa($filters = null , $Filterslanguage = null, $FiltersCategorys = null , $maxPriceDisc  = null, $minPriceDisc  = null, $durMin = null, $durMax = null,$maxDiscount = null ,$minDiscount = null)
    {
        $coachings=$this->coachRepository->findAll();

        if ($filters !== null && !empty($filters)) {
            $filteredCochings = array_filter($coachings, function($cour) use ($filters) {
                return in_array($cour->getLevel(), $filters);
            });
            $coachings = $filteredCochings;
        }
        if ($FiltersCategorys !== null && !empty($FiltersCategorys)) {
            $filteredCochings = array_filter($coachings, function($cour) use ($FiltersCategorys) {
                return in_array($cour->getCategorie(), $FiltersCategorys);
            });
            $coachings = $filteredCochings;
        }

        if ($Filterslanguage !== null && !empty($Filterslanguage)) {
            $filteredCochings = array_filter($coachings, function($cour) use ($Filterslanguage) {
                return in_array($cour->getLangue(), $Filterslanguage);
            });
            $coachings = $filteredCochings;
        }
        if ($minPriceDisc !== null && $maxPriceDisc !== null) {
            $filteredCochings = array_filter($coachings, function($cour) use ($minPriceDisc, $maxPriceDisc) {
                return ($cour->getPrix() >= $minPriceDisc) && ($cour->getPrix() <= $maxPriceDisc) ;
            });
            $coachings = $filteredCochings;
        }
        if ($durMin !== null && $durMax !== null) {
            // Initialiser le tableau $filteredCochings
            $filteredCoachings = [];
        
            // Parcourir chaque coaching
            foreach ($coachings as $cour) {
                // Appeler la méthode getDuree pour obtenir la durée du coaching
                $dure = $this->getDuree($cour->getId());
        
                // Vérifier si la durée est dans la plage souhaitée
                if ($dure >= $durMin && $dure <= $durMax) {
                    // Ajouter le coaching à la liste filtrée
                    $filteredCoachings[] = $cour;
                }
            }
        
            // Mettre à jour $coachings avec les résultats filtrés
            $coachings = $filteredCoachings;
        }

        if ($minDiscount !== null && $maxDiscount !== null) {
            $filteredcoachings = array_filter($coachings, function($cour) use ($minDiscount, $maxDiscount) {
                return ($cour->getDiscount() >= $minDiscount) && ($cour->getDiscount() <= $maxDiscount);
            });
            $coachings = $filteredcoachings;
        }
        $coachingsData = [];
        $allCategories = [];
        $contents = [];
        foreach ($coachings as $course) {
            $contents = [];
            $AllCoachSteps= $this->coachingStepRepository->findAll();
            $AllcoachContents= $this->coachingStepContentRepository->findAll();
            foreach($AllCoachSteps as $coach){
                if($coach->getIdCoaching() == $course->getId()){
                    foreach($AllcoachContents as $content){
                        if($content->getIdStep() == $coach->getIdStep()){
                            $contents[] = $content;
                        }
                    }

                }

            }
            $contributor = $this->contributorRepository->find($course->getIdContributor());
            $user = $this->usersRepository->find($contributor ? $contributor->getIdUser() : null);
            $ratings = $this->coachingRatingRepository->countByIdUser($user ? $user->getId() : null);
            $followers = $this->contributorFollowersRepository->count(['idContributor' => $contributor ? $contributor->getId() : null]);
            $coachCateg4=$course->getSousCategorie4();
            $idsArray = explode(',', $coachCateg4);

            // Convertir chaque élément en entier
            $idsArray = array_map('intval', $idsArray);
            $allCategories[] = $idsArray;

           // $coachNiveauId = $course->getLevel();
           $coachNiveauId = (int) $course->getLevel();
 
           $coachNiveau = $coachNiveauId ? $this->coachingNiveauRepository->find($coachNiveauId) : null;
           $label1 = $coachNiveau ? $coachNiveau->getLabel() : null;
       
            $coachingsData[] = [
                'course' => $course,
                'contributor' => $contributor,
                'user' => $user,
                'userImage' => $user ? $user->getPhoto() : null,
                'ratings' => $ratings,
                'coachNiveau' => $coachNiveau,
                'label1' => $label1,
                'followers'=>$followers,
                'idsArray'=>$idsArray,
                'allCategories'=>$allCategories,
                'contents' => $contents,
            ];
        }

        return $coachingsData;
    }

    public function getCoachingDataaa( $Filterslanguage = null, $filters = null, $FiltersCategorys = null,$minPrice = null,$maxPrice = null, $durMin = null, $durMax = null )
    {
        $coachings=$this->coachRepository->findAll();

        if ($filters !== null && !empty($filters)) {
            $filteredCochings = array_filter($coachings, function($cour) use ($filters) {
                return in_array($cour->getLevel(), $filters);
            });
            $coachings = $filteredCochings;
        }
      
        if ($Filterslanguage !== null && !empty($Filterslanguage)) {
            $filteredCochings = array_filter($coachings, function($cour) use ($Filterslanguage) {
                return in_array($cour->getLangue(), $Filterslanguage);
            });
            $coachings = $filteredCochings;
        }
        if ($FiltersCategorys !== null && !empty($FiltersCategorys)) {
            $filteredCochings = array_filter($coachings, function($cour) use ($FiltersCategorys) {
                return in_array($cour->getCategorie(), $FiltersCategorys);
            });
            $coachings = $filteredCochings;
        }
        if ($minPrice !== null && $maxPrice !== null) {
            $filteredCochings = array_filter($coachings, function($cour) use ($minPrice, $maxPrice) {
                return ($cour->getPrix() >= $minPrice) && ($cour->getPrix() <= $maxPrice) ;
            });
            $coachings = $filteredCochings;
        }
        if ($durMin !== null && $durMax !== null) {
            // Initialiser le tableau $filteredCochings
            $filteredCoachings = [];
        
            // Parcourir chaque coaching
            foreach ($coachings as $cour) {
                // Appeler la méthode getDuree pour obtenir la durée du coaching
                $dure = $this->getDuree($cour->getId());
        
                // Vérifier si la durée est dans la plage souhaitée
                if ($dure >= $durMin && $dure <= $durMax) {
                    // Ajouter le coaching à la liste filtrée
                    $filteredCoachings[] = $cour;
                }
            }
        
            // Mettre à jour $coachings avec les résultats filtrés
            $coachings = $filteredCoachings;
        }
        
        

        $coachingsData = [];
        $allCategories = [];
        $contents = [];
        foreach ($coachings as $course) {
            $contents = [];
            $AllCoachSteps= $this->coachingStepRepository->findAll();
            $AllcoachContents= $this->coachingStepContentRepository->findAll();
            foreach($AllCoachSteps as $coach){
                if($coach->getIdCoaching() == $course->getId()){
                    foreach($AllcoachContents as $content){
                        if($content->getIdStep() == $coach->getIdStep()){
                            $contents[] = $content;
                        }
                    }

                }

            }
            $contributor = $this->contributorRepository->find($course->getIdContributor());
            $user = $this->usersRepository->find($contributor ? $contributor->getIdUser() : null);
            $ratings = $this->coachingRatingRepository->countByIdUser($user ? $user->getId() : null);
            $followers = $this->contributorFollowersRepository->count(['idContributor' => $contributor ? $contributor->getId() : null]);
            $coachCateg4=$course->getSousCategorie4();
            $idsArray = explode(',', $coachCateg4);

            // Convertir chaque élément en entier
            $idsArray = array_map('intval', $idsArray);
            $allCategories[] = $idsArray;

           // $coachNiveauId = $course->getLevel();
           $coachNiveauId = (int) $course->getLevel();
 
           $coachNiveau = $coachNiveauId ? $this->coachingNiveauRepository->find($coachNiveauId) : null;
           $label1 = $coachNiveau ? $coachNiveau->getLabel() : null;
       
            $coachingsData[] = [
                'course' => $course,
                'contributor' => $contributor,
                'user' => $user,
                'userImage' => $user ? $user->getPhoto() : null,
                'ratings' => $ratings,
                'coachNiveau' => $coachNiveau,
                'label1' => $label1,
                'followers'=>$followers,
                'idsArray'=>$idsArray,
                'allCategories'=>$allCategories,
                'contents' => $contents,
            ];
        }

        return $coachingsData;
    }
    // filtrage coachings par mot clés 
    public function getCoachingsByKeyWord($mot){
        $coachings = $this->coachingRepository->findAll();
        $searchedcoachings = [];
        foreach($coachings as $coach){
            if((strpos($coach->getTitre(), $mot) !== false)
                || (strpos($coach->getSkillsRequired(), $mot) !== false)
                 || (strpos($coach->getSkillsProvided(), $mot) !== false)){

                    $searchedcoachings[$coach->getId()] = $coach;

            }
        }
        return $searchedcoachings;
    }

    public function getDuree(int $idCoaching) {
        // Retrieve sections by course ID
        $steps = $this->coachingStepRepository->findBy(['idCoaching' => $idCoaching]);
    
        // Initialize variables to store lecture and content IDs
        $duree = null;
    
        // Iterate through sections to find associated lectures and content
        foreach ($steps as $step) {
            // Find a lecture by section ID
            $stepContent = $this->coachingStepContentRepository->findOneBy(['idStep' => $step->getIdStep()]);
            
            if ($stepContent) {
                //echo "Found step content for step ID " . $step->getIdStep() . "\n";
                //echo "Durée trouvée: " . $stepContent->getDure() . "\n";
                $duree = $stepContent->getDure();
    
                // Check if durée is valid
                if ($duree === null) {
                   // echo "Aucune durée trouvée pour le contenu de l'étape ID " . $stepContent->getIdStep() . "\n";
                } elseif ($duree == 0) {
                   // echo "Durée est 0 pour le contenu de l'étape ID " . $stepContent->getIdStep() . "\n";
                } else {
                    //echo "Durée valide trouvée: " . $duree . "\n";
                    break; // Stop after finding the first matching lecture and content
                }
            } else {
                //echo "Aucun contenu trouvé pour l'étape ID " . $step->getIdStep() . "\n";
            }
        }
    
        // Debug output
       // echo "Durée finale pour coaching ID " . $idCoaching . ": " . $duree . "\n";
    
        // Return the duration found, or null if no matching records were found
        return $duree;
    }
    


    public function getCoachingsByStepKeyWord($mot1){
        $steps = $this->coachingStepRepository->findAll();
        $searchedCoachs = [];
        foreach($steps as $step){
            if((strpos($step->getTitre(), $mot1) !== false)
              || (strpos($step->getSkillsProvided(), $mot1) !== false)
              || (strpos($step->getYouWillLearn(), $mot1) !== false)){
                $coach = $this->coachingRepository->find($step->getIdCoaching());
                $searchedCoachs[$coach->getId()] = $coach;
            }
        }
return array_values($searchedCoachs);
    }
    
    public function getCoachingsByStepContentKeyWord($mot2){
        $stepsContents = $this->coachingStepContentRepository->findAll();
        $searchedSteps = [];
        $searchedcoach = [];
         foreach($stepsContents as $cont){
            if((strpos($cont->getTitre(), $mot2) !== false)
            || (strpos($cont->getDescription(), $mot2) !== false)){
                $searchedSteps[$cont->getIdContent()] = $cont;
            }

         }


    // Récupération des steps par les contents filtrées
     foreach ($searchedSteps as $lec1) {  
        $sec = $this->coachingStepRepository->find($lec1->getIdStep());
        if ($sec) {
            // Récupération des coaching associés à la steps
            $cochingSec = $this->coachingRepository->find($sec->getIdCoaching());
            
            // Vérifiez si $coursSec est un tableau ou une collection
            if (is_array($cochingSec) || $cochingSec instanceof \Traversable) {
                foreach ($cochingSec as $course) {
                    // Ajout du coaching au tableau sans doublon
                    $searchedcoach[$course->getId()] = $course;
                }
            } else {
                // Gestion du cas où cochingSec n'est pas un tableau
                if ($cochingSec) {
                    $searchedcoach[$cochingSec->getId()] = $cochingSec;
                }
            }
        }
    }

    return array_values($searchedcoach); // Retourne un tableau indexé pour les cours
}

public function getCoachings(string $mot5){
    // Appel des méthodes de recherche avec le mot-clé
    $coachParMot1 = $this->getCoachingsByKeyWord($mot5);
    $coachParMot2 = $this->getCoachingsByStepKeyWord($mot5);
    $coachParMot3 = $this->getCoachingsByStepContentKeyWord($mot5);
  

    // Fusionner les résultats en un seul tableau, en utilisant l'ID du cours comme clé pour éviter les doublons
        $coachingCombine = [];
    // Ajouter les résultats des différentes méthodes
     $coachingCombine = array_merge($coachingCombine, $coachParMot1);
     $coachingCombine = array_merge($coachingCombine, $coachParMot2);
     $coachingCombine = array_merge($coachingCombine, $coachParMot3);
    
     // Retourner la liste des cours sans doublons
     return $coachingCombine;

        }
        public function Test()
        {
            // Récupère tous les coachings
            $coachings = $this->coachRepository->findAll();
            $result = [];
        
            foreach ($coachings as $coaching) {
                $coachingContents = [];
                $steps = $this->coachingStepRepository->findBy(['idCoaching' => $coaching->getId()]);
        
                // Récupère les contenus associés à chaque étape
                foreach ($steps as $step) {
                    $stepContents = $this->coachingStepContentRepository->findBy(['idStep' => $step->getIdStep()]);
                    $coachingContents = array_merge($coachingContents, $stepContents);
                }
        
                // Structure les données avec les informations du coaching et ses contenus associés
                $result[] = [
                    'coaching' => $coaching,
                    'contents' => $coachingContents
                ];
            }
        
            return $result;
        }
        
        public function getSubCateg4(?int $id)
        {
            if ($id === null) {
                // Handle the case where $id is null, e.g., return null or throw an exception
                return null; // or throw new \InvalidArgumentException('ID cannot be null');
            }
        
            $categ4 = $this->coaching4Repository->findAll();
        
            foreach ($categ4 as $cat) {
                if ($cat->getIdCateg4() == $id) {
                    return $cat;
                }
            }
        
            // Optionally handle the case where no category is found
            return null; // or throw new \Exception('Category not found');
        }
        

}