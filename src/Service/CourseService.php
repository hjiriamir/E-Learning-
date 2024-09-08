<?php
namespace App\Service;

use App\Entity\CoursFinal;
use App\Repository\ContributorFollowersRepository;
use App\Repository\ContributorRatingRepository;
use App\Repository\ContributorRepository;
use App\Repository\CoursNiveauRepository;
use App\Repository\CoursRatingRepository;
use App\Repository\CoursFinalRepository;
use App\Repository\UsersRepository;
use App\Repository\CoursCategorie2Repository;
use App\Repository\CoursCategorieRepository;
use App\Repository\CoursCategorie3Repository;
use App\Repository\CoursCategorie4Repository;
use App\Repository\LectureContentRepository;
use App\Repository\CoursLectureRepository;
use App\Repository\CoursSectionRepository;
use App\Repository\ContributorCertificationRepository;
use Container6Si0zVw\getCoursFormTypeService;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\HttpFoundation\Response;

class CourseService
{
    private $coursRepository;
    private $contributorRepository;
    private $usersRepository;
    private $contributorFollowersRepository;
    private $contributorRatingRepository;
    private $coursNiveauRepository;
    private $coursRatingRepository;
    private $categorieRepository;
    private $categorie2Repository;
    private $categorie3Repository;
    private $categorie4Repository;
    private $lectureContentRepository;

    private $coursLectureRepository;
    private $coursSectionRepository;

    private $contributorCertificationRepository;

    
 
    public function __construct(
        CoursFinalRepository $coursRepository,
        ContributorRepository $contributorRepository,
        UsersRepository $usersRepository,
        ContributorFollowersRepository $contributorFollowersRepository,
        ContributorRatingRepository $contributorRatingRepository,
        CoursNiveauRepository $coursNiveauRepository,
        CoursRatingRepository $coursRatingRepository,
        CoursCategorie4Repository $coursCategorie4Repository,
        CoursCategorie3Repository $coursCategorie3Repository,
        CoursCategorie2Repository $coursCategorie2Repository,
        CoursCategorieRepository $coursCategorieRepository,
        LectureContentRepository $lectureContentRepository,
        CoursSectionRepository $coursSectionRepository,
        CoursLectureRepository $coursLectureRepository,
        ContributorCertificationRepository $contributorCertificationRepository,
        
     
        
    ) {
        $this->coursRepository = $coursRepository;
        $this->contributorRepository = $contributorRepository;
        $this->usersRepository = $usersRepository;
        $this->contributorFollowersRepository = $contributorFollowersRepository;
        $this->contributorRatingRepository = $contributorRatingRepository;
        $this->coursNiveauRepository = $coursNiveauRepository;
        $this->coursRatingRepository = $coursRatingRepository;
        $this->categorieRepository = $coursCategorieRepository;
        $this->categorie2Repository = $coursCategorie2Repository;
        $this->categorie3Repository = $coursCategorie3Repository;
        $this->categorie4Repository = $coursCategorie4Repository;
        $this->lectureContentRepository = $lectureContentRepository;
        $this->coursLectureRepository = $coursLectureRepository;
        $this->coursSectionRepository = $coursSectionRepository;
        $this->contributorCertificationRepository = $contributorCertificationRepository;

     
    }
// Contributor Section 
    public function getContributorsData()
    {
        $contributors = $this->contributorRepository->findAll();
        $contributorsData = [];

        foreach ($contributors as $contributor) {
            $user = $this->usersRepository->find($contributor ? $contributor->getIdUser() : null);
            $followers = $this->contributorFollowersRepository->count(['idContributor' => $contributor ? $contributor->getId() : null]);
            $ratings = $this->contributorRatingRepository->countByIdContributor($contributor ? $contributor->getId() : null);

            $contributorsData[] = [
                'contributor' => $contributor,
                'user' => $user,
                'followers' => $followers,
                'ratings' => $ratings,
            ];
        }

        return $contributorsData;
    }
    //recupération des contributors oar mot clé
    public function getContributorsByKeyWord($mot){
        $contributors = $this->contributorRepository->findAll();
        $searchedcontributor = [];
        foreach($contributors as $cont){
                if((strpos($cont->getDescription(), $mot) !== false)
                 || (strpos($cont->getDomaine(), $mot) !== false)   ){
             
                    $searchedcontributor[$cont->getId()] = $cont;
                }
        }
        return $searchedcontributor;
    }

    // recupération des contributors d'après certeficats filtrés par mot clé
    public function getContributorsByCertifKeyWord($mot1)
    {
        // Récupération de toutes les certifications
        $contCertif = $this->contributorCertificationRepository->findAll();
        $contributorsCertif = [];
        $searchedcontributors = [];
    
        // Filtrage des certifications basées sur le mot-clé
        foreach ($contCertif as $certif) {
            if ((strpos($certif->getTitre(), $mot1) !== false)
                || (strpos($certif->getDomaine(), $mot1) !== false)
                || (strpos($certif->getDescription(), $mot1) !== false)) {
                
                $contributorsCertif[$certif->getIdCertif()] = $certif;
            }
        }
    
        // Récupération des contributeurs basés sur les certifications filtrées
        foreach ($contributorsCertif as $sec1) {
            // Récupération du contributeur en fonction de l'ID utilisateur
            $contributorCertif = $this->contributorRepository->findByUserId($sec1->getIdUser());
    
            // Ajout des contributeurs à la liste sans doublons
            foreach ($contributorCertif as $contributor) {
                // Utilisation de l'ID du contributeur comme clé pour éviter les doublons
                $searchedcontributors[$contributor->getId()] = $contributor;
            }
        }
    
        // Retourne un tableau indexé pour la liste finale des contributeurs
        return array_values($searchedcontributors);
    }
    
    
    public function getContributors($mot2){
         // Appel des méthodes de recherche avec le mot-clé
    $coursParMot1 = $this->getContributorsByKeyWord($mot2);
    $coursParMot2 = $this->getContributorsByCertifKeyWord($mot2);
   

    // Fusionner les résultats en un seul tableau, en utilisant l'ID du cours comme clé pour éviter les doublons
        $contributorCombine = [];
    // Ajouter les résultats des différentes méthodes
     $contributorCombine = array_merge($contributorCombine, $coursParMot1);
     $contributorCombine = array_merge($contributorCombine, $coursParMot2);
    
 
     // Retourner la liste des cours sans doublons
     return $contributorCombine;

    }
// End Contributor section 

// Course Section 
    public function getCoursesData($filters = null , $Filterslanguage = null, $FiltersCategorys = null , $minPrice = null, $maxPrice = null, $durMin = null, $durMax = null)
    {
        
        //cours Content recuperation
        $courses = $this->coursRepository->findAll();

        

        if ($filters !== null && !empty($filters)) {
            $filteredCourses = array_filter($courses, function($cour) use ($filters) {
                return in_array($cour->getLevel(), $filters);
            });
            $courses = $filteredCourses;
        }

        if ($Filterslanguage !== null && !empty($Filterslanguage)) {
            $filteredCourses = array_filter($courses, function($cour) use ($Filterslanguage) {
                return in_array($cour->getLangue(), $Filterslanguage);
            });
            $courses = $filteredCourses;
        }

        if ($FiltersCategorys !== null && !empty($FiltersCategorys)) {
            $filteredCourses = array_filter($courses, function($cour) use ($FiltersCategorys) {
                return in_array($cour->getCategorie(), $FiltersCategorys);
            });
            $courses = $filteredCourses;
        }
     
        if ($minPrice !== null && $maxPrice !== null) {
            $filteredCourses = array_filter($courses, function($cour) use ($minPrice, $maxPrice) {
                return ($cour->getPrix() >= $minPrice) && ($cour->getPrix() <= $maxPrice) ;
            });
            $courses = $filteredCourses;
        }
      
            if($durMin !== null && $durMax!== null){
                foreach($courses as $cour){
                    $dure = $this->getDuree($cour->getId());
                    if($dure >= $durMin && $dure <= $durMax ){
                                //$filteredCourses=$cour;
                                $filteredCourses[] = $cour;
                    }
              }
              $courses = $filteredCourses;
            }

        $coursesData = [];

        $contents = [];
        $allCoursCategories = [];
        foreach ($courses as $course) {
           /* $AllSections= $this->coursSectionRepository->findAll();
            $AllCoursLecture= $this->coursLectureRepository->findAll();
            $Allcontents= $this->lectureContentRepository->findAll();*/
            $contents = [];
            $AllSections= $this->coursSectionRepository->findAll();
            $AllCoursLecture= $this->coursLectureRepository->findAll();
            $Allcontents= $this->lectureContentRepository->findAll();

            foreach($AllSections as $sec){
                if($sec->getIdCours()== $course->getId()){
                   // $SectionsData[]=$sec;
                    foreach($AllCoursLecture as $lec){
                            if($lec->getIdSection()== $sec->getIdSection()){
                                        foreach($Allcontents as $cont){
                                                if($cont->getIdLecture()==$lec->getIdLecture()){
                                                   // $LectureContentData []=$cont;
                                                   $contents[] = $cont;
                                                }
                                        }
                            }
                    }
                }
            }
            
          

 //end cours Content recuperation

 //convertir chaine de caractere des sousCateg4 en des entiers
            $coursCateg4=$course->getSousCategorie4();
            $idsArray = explode(',', $coursCateg4);
             // Convertir chaque élément en entier
             $idsArray = array_map('intval', $idsArray);
             $allCategories[] = $idsArray;

            $contributor = $this->contributorRepository->find($course->getIdContributor());
            $user = $this->usersRepository->find($contributor ? $contributor->getIdUser() : null);
            $followers = $this->contributorFollowersRepository->count(['idContributor' => $contributor ? $contributor->getId() : null]);
            $ratings = $this->contributorRatingRepository->countByIdContributor($contributor ? $contributor->getId() : null);
            
            $coursNiveauId = $course->getLevel();
            $coursNiveau = $coursNiveauId ? $this->coursNiveauRepository->find($coursNiveauId) : null;
            $label1 = $coursNiveau ? $coursNiveau->getLabel() : null;
            $ratings1 = $this->coursRatingRepository->findAll();
            $ratings2 = null;
            $Id2=(int) $course->getSousCategorie4();
            foreach ($ratings1 as $rat) {
                if ($rat->getIdCours() == $course->getId()) {
                    $ratings2 = $rat->getValue();
                }
            }

            $coursesData[] = [
                'course' => $course,
                'contributor' => $contributor,
                'user' => $user,
                'courseImage' => $course->getImageCours(),
                'userImage' => $user ? $user->getPhoto() : null,
                'followers' => $followers,
                'ratings' => $ratings,
                'coursNiveau' => $coursNiveau,
                'label1' => $label1,
                'ratings2' => $ratings2,
                'Id2' => $Id2,
                'contents' => $contents,
                'idsArray'=>$idsArray,
                'allCategories'=>$allCategories,
            ];
          
        }

        return $coursesData;
    }


    public function getFiltredCourses($filters = null , $Filterslanguage = null, $FiltersCategorys = null , $maxPriceDisc  = null, $minPriceDisc  = null, $durMin = null, $durMax = null,$minDiscount = null ,$maxDiscount = null)
    {
        
        //cours Content recuperation
        $courses = $this->coursRepository->findAll();

      

        if ($filters !== null && !empty($filters)) {
            $filteredCourses = array_filter($courses, function($cour) use ($filters) {
                return in_array($cour->getLevel(), $filters);
            });
            $courses = $filteredCourses;
        }

    

        if ($FiltersCategorys !== null && !empty($FiltersCategorys)) {
            $filteredCourses = array_filter($courses, function($cour) use ($FiltersCategorys) {
                return in_array($cour->getCategorie(), $FiltersCategorys);
            });
            $courses = $filteredCourses;
        }
        if ($Filterslanguage !== null && !empty($Filterslanguage)) {
            $filteredCourses = array_filter($courses, function($cour) use ($Filterslanguage) {
                return in_array($cour->getLangue(), $Filterslanguage);
            });
            $courses = $filteredCourses;
        }
     
        if ($minPriceDisc !== null && $maxPriceDisc !== null) {
            $filteredCourses = array_filter($courses, function($cour) use ($minPriceDisc, $maxPriceDisc) {
                return ($cour->getPrix() >= $minPriceDisc) && ($cour->getPrix() <= $maxPriceDisc) ;
            });
            $courses = $filteredCourses;
        }
      
            if($durMin !== null && $durMax!== null){
                foreach($courses as $cour){
                    $dure = $this->getDuree($cour->getId());
                    if($dure >= $durMin && $dure <= $durMax ){
                                //$filteredCourses=$cour;
                                $filteredCourses[] = $cour;
                    }
              }
              $courses = $filteredCourses;
            }
            if ($minDiscount !== null && $maxDiscount !== null) {
                $filteredCourses = array_filter($courses, function($cour) use ($minDiscount, $maxDiscount) {
                    return ($cour->getDiscount() >= $minDiscount) && ($cour->getDiscount() <= $maxDiscount) ;
                });
                $courses = $filteredCourses;
            }
        $coursesData = [];

        $contents = [];
        $allCoursCategories = [];
        foreach ($courses as $course) {
           /* $AllSections= $this->coursSectionRepository->findAll();
            $AllCoursLecture= $this->coursLectureRepository->findAll();
            $Allcontents= $this->lectureContentRepository->findAll();*/
            $contents = [];
            $AllSections= $this->coursSectionRepository->findAll();
            $AllCoursLecture= $this->coursLectureRepository->findAll();
            $Allcontents= $this->lectureContentRepository->findAll();

            foreach($AllSections as $sec){
                if($sec->getIdCours()== $course->getId()){
                   // $SectionsData[]=$sec;
                    foreach($AllCoursLecture as $lec){
                            if($lec->getIdSection()== $sec->getIdSection()){
                                        foreach($Allcontents as $cont){
                                                if($cont->getIdLecture()==$lec->getIdLecture()){
                                                   // $LectureContentData []=$cont;
                                                   $contents[] = $cont;
                                                }
                                        }
                            }
                    }
                }
            }
            
          

 //end cours Content recuperation

 //convertir chaine de caractere des sousCateg4 en des entiers
            $coursCateg4=$course->getSousCategorie4();
            $idsArray = explode(',', $coursCateg4);
             // Convertir chaque élément en entier
             $idsArray = array_map('intval', $idsArray);
             $allCategories[] = $idsArray;

            $contributor = $this->contributorRepository->find($course->getIdContributor());
            $user = $this->usersRepository->find($contributor ? $contributor->getIdUser() : null);
            $followers = $this->contributorFollowersRepository->count(['idContributor' => $contributor ? $contributor->getId() : null]);
            $ratings = $this->contributorRatingRepository->countByIdContributor($contributor ? $contributor->getId() : null);
            
            $coursNiveauId = $course->getLevel();
            $coursNiveau = $coursNiveauId ? $this->coursNiveauRepository->find($coursNiveauId) : null;
            $label1 = $coursNiveau ? $coursNiveau->getLabel() : null;
            $ratings1 = $this->coursRatingRepository->findAll();
            $ratings2 = null;
            $Id2=(int) $course->getSousCategorie4();
            foreach ($ratings1 as $rat) {
                if ($rat->getIdCours() == $course->getId()) {
                    $ratings2 = $rat->getValue();
                }
            }

            $coursesData[] = [
                'course' => $course,
                'contributor' => $contributor,
                'user' => $user,
                'courseImage' => $course->getImageCours(),
                'userImage' => $user ? $user->getPhoto() : null,
                'followers' => $followers,
                'ratings' => $ratings,
                'coursNiveau' => $coursNiveau,
                'label1' => $label1,
                'ratings2' => $ratings2,
                'Id2' => $Id2,
                'contents' => $contents,
                'idsArray'=>$idsArray,
                'allCategories'=>$allCategories,
            ];
          
        }

        return $coursesData;
    }


    public function getCoursesDataa($maxDiscount = null ,$minDiscount = null ,$filters = null , $Filterslanguage = null, $FiltersCategorys = null , $minPrice = null, $maxPrice = null, $durMin = null, $durMax = null)
    {
        
        //cours Content recuperation
        $courses = $this->coursRepository->findAll();

      
           
    
      // Filtrage des cours en fonction des valeurs maxDiscount et minDiscount
      if ($maxDiscount !== null && $minDiscount !== null) {
        $courses = array_filter($courses, function ($cour) use ($maxDiscount, $minDiscount) {
            $discount = $cour->getDiscount();
            return $discount <= $maxDiscount && $discount >= $minDiscount;
        });
    } elseif ($maxDiscount !== null) {
        $courses = array_filter($courses, function ($cour) use ($maxDiscount) {
            return $cour->getDiscount() <= $maxDiscount;
        });
    } elseif ($minDiscount !== null) {
        $courses = array_filter($courses, function ($cour) use ($minDiscount) {
            return $cour->getDiscount() >= $minDiscount;
        });
    }

        $coursesData = [];

        $contents = [];
        $allCoursCategories = [];
        foreach ($courses as $course) {
           /* $AllSections= $this->coursSectionRepository->findAll();
            $AllCoursLecture= $this->coursLectureRepository->findAll();
            $Allcontents= $this->lectureContentRepository->findAll();*/
            $contents = [];
            $AllSections= $this->coursSectionRepository->findAll();
            $AllCoursLecture= $this->coursLectureRepository->findAll();
            $Allcontents= $this->lectureContentRepository->findAll();

            foreach($AllSections as $sec){
                if($sec->getIdCours()== $course->getId()){
                   // $SectionsData[]=$sec;
                    foreach($AllCoursLecture as $lec){
                            if($lec->getIdSection()== $sec->getIdSection()){
                                        foreach($Allcontents as $cont){
                                                if($cont->getIdLecture()==$lec->getIdLecture()){
                                                   // $LectureContentData []=$cont;
                                                   $contents[] = $cont;
                                                }
                                        }
                            }
                    }
                }
            }
            
          

 //end cours Content recuperation

 //convertir chaine de caractere des sousCateg4 en des entiers
            $coursCateg4=$course->getSousCategorie4();
            $idsArray = explode(',', $coursCateg4);
             // Convertir chaque élément en entier
             $idsArray = array_map('intval', $idsArray);
             $allCategories[] = $idsArray;

            $contributor = $this->contributorRepository->find($course->getIdContributor());
            $user = $this->usersRepository->find($contributor ? $contributor->getIdUser() : null);
            $followers = $this->contributorFollowersRepository->count(['idContributor' => $contributor ? $contributor->getId() : null]);
            $ratings = $this->contributorRatingRepository->countByIdContributor($contributor ? $contributor->getId() : null);
            
            $coursNiveauId = $course->getLevel();
            $coursNiveau = $coursNiveauId ? $this->coursNiveauRepository->find($coursNiveauId) : null;
            $label1 = $coursNiveau ? $coursNiveau->getLabel() : null;
            $ratings1 = $this->coursRatingRepository->findAll();
            $ratings2 = null;
            $Id2=(int) $course->getSousCategorie4();
            foreach ($ratings1 as $rat) {
                if ($rat->getIdCours() == $course->getId()) {
                    $ratings2 = $rat->getValue();
                }
            }

            $coursesData[] = [
                'course' => $course,
                'contributor' => $contributor,
                'user' => $user,
                'courseImage' => $course->getImageCours(),
                'userImage' => $user ? $user->getPhoto() : null,
                'followers' => $followers,
                'ratings' => $ratings,
                'coursNiveau' => $coursNiveau,
                'label1' => $label1,
                'ratings2' => $ratings2,
                'Id2' => $Id2,
                'contents' => $contents,
                'idsArray'=>$idsArray,
                'allCategories'=>$allCategories,
            ];
          
        }

        return $coursesData;
    }
    public function getCoursContents(int $id){
       
        $contents = [];
            $AllSections= $this->coursSectionRepository->findAll();
            $AllCoursLecture= $this->coursLectureRepository->findAll();
            $Allcontents= $this->lectureContentRepository->findAll();

            foreach($AllSections as $sec){
                if($sec->getIdCours()== $id){
                   // $SectionsData[]=$sec;
                    foreach($AllCoursLecture as $lec){
                            if($lec->getIdSection()== $sec->getIdSection()){
                                        foreach($Allcontents as $cont){
                                                if($cont->getIdLecture()==$lec->getIdLecture()){
                                                   // $LectureContentData []=$cont;
                                                   $contents[] = $cont;
                                                }
                                        }
                            }
                    }
                }
            }
            return $contents;
    }
    public function getCourseCategorie(){
        return $categories = $this->categorieRepository->findAll();
     }
     public function getCourseCategorie2(){
        
        $categories = $this->categorie2Repository->findAll();
        return $categories ;
    }
    public function getCourseCategorie3(){
        $categories = $this->categorie3Repository->findAll();
        return $categories ;
    }
    public function getCourseCategorie4(){
        $categories = $this->categorie4Repository->findAll();
        return $categories ;
    }


    public function getCoursBySection(int $id){
        $coursSection = $this->coursRepository->find($id);
    return $coursSection;
      }
   
    public function getSectionsByLecture(int $id){

    }
/*public function getDuree(int $idCours){
    $sectionId = $this->coursSectionRepository->findBy(['idCours' => $idCours]);
    $LectureId = $this->coursLectureRepository->findOneBy(['idSection'=>$sectionId]);
    $contentId = $this->lectureContentRepository->findOneBy(['idLecture'=>$LectureId]);
    //$content1 = $this->lectureContentRepository->findOneBy(['idContent'=>$contentId]);

    return $this->$LectureId->getDuree();
}*/
public function getDuree(int $idCours) {
    // Retrieve sections by course ID
    $sections = $this->coursSectionRepository->findBy(['idCours' => $idCours]);

    // Initialize variables to store lecture and content IDs
    $duree = null;

    // Iterate through sections to find associated lectures and content
    foreach ($sections as $section) {
        // Find a lecture by section ID
        $lecture = $this->coursLectureRepository->findOneBy(['idSection' => $section->getIdSection()]);

        if ($lecture) {
            // Find content by lecture ID
            $content = $this->lectureContentRepository->findOneBy(['idLecture' => $lecture->getIdLecture()]);

            if ($content) {
                // Assuming getDuree() is a method in the Lecture entity
                $duree = $content->getDure();
                break; // Stop after finding the first matching lecture and content
            }
        }
    }

    // Return the duration found, or null if no matching records were found
    return $duree;
}
public function getCoursContent(int $idCours) {
    // Retrieve sections by course ID
    $sections = $this->coursSectionRepository->findBy(['idCours' => $idCours]);

    // Initialize variables to store lecture and content IDs

    // Iterate through sections to find associated lectures and content
    foreach ($sections as $section) {
        // Find a lecture by section ID
        $lecture = $this->coursLectureRepository->findOneBy(['idSection' => $section->getIdSection()]);

        if ($lecture) {
            // Find content by lecture ID
            $content = $this->lectureContentRepository->findOneBy(['idLecture' => $lecture->getIdLecture()]);

            if ($content) {
                // Assuming getDuree() is a method in the Lecture entity
                $duree = $content->getDure();
                break; // Stop after finding the first matching lecture and content
            }
        }
    }

    // Return the duration found, or null if no matching records were found
    return $content;
}

  
    public function getCourseBykeyWord(string $mot1){
        $courses = $this->coursRepository->findAll();
        $searchedcours = [];
        // Filtrage des cours
        foreach ($courses as $cour) {
            if (strpos($cour->getTitre(), $mot1) !== false 
                || strpos($cour->getDescription(), $mot1) !== false 
                || strpos($cour->getSousTitre(), $mot1) !== false 
                || strpos($cour->getWhatToLearn(), $mot1) !== false) {
                $searchedcours[$cour->getId()] = $cour; // Utilisation de l'ID pour éviter les doublons
            }
        }
        return $searchedcours;
    }


    public function getCourseByKeyWordDepuisSections(string $mot2) {

        $searchedcours_section = []; // Pour stocker les sections correspondantes
        $searchedcours = []; // Pour stocker les cours correspondants
        $sections = $this->coursSectionRepository->findAll();
    
         // Filtrage des sections
        foreach ($sections as $sec) {
            if ((strpos($sec->getTitreSection(), $mot2) !== false) 
            || (strpos($sec->getDescription(), $mot2) !== false)
            || (strpos($sec->getWhatWillStudentsBeAbleTo(), $mot2) !== false) ) {
                $searchedcours_section[$sec->getIdSection()] = $sec;
            }
        }
    
       // Récupération des cours par les sections filtrées
       foreach ($searchedcours_section as $sec1) {
        $coursSec = $this->coursRepository->find($sec1->getIdCours());
       // Vérifiez si `find` retourne un objet ou une collection
       if ($coursSec) {
        // Si `find` retourne un seul cours, enveloppez-le dans un tableau
        $coursSec = [$coursSec];
    }

    // Ajout des cours sans doublon
    foreach ($coursSec as $course) {
        $searchedcours[$course->getId()] = $course; // Utilisation de l'ID du cours comme clé pour éviter les doublons
    }
}


return array_values($searchedcours); // Retourne un tableau indexé pour la liste finale des cours
}
    

    


    public function getCourseByKeyWordDepuisLecture(string $mot3){
        $searchedcours_lecture = [];
        $searchedcours = [];
        $coursLecture = $this->coursLectureRepository->findAll();
         // Filtrage des lectures
         foreach ($coursLecture as $lec) {
            if (strpos($lec->getTitre(), $mot3) !== false 
                || strpos($lec->getDescription(), $mot3) !== false) {
                $searchedcours_lecture[$lec->getIdLecture()] = $lec;
            }
        }

     // Récupération des sections par les lectures filtrées
     foreach ($searchedcours_lecture as $lec1) {  
        $sec = $this->coursSectionRepository->find($lec1->getIdSection());
        if ($sec) {
            // Récupération des cours associés à la section
            $coursSec = $this->getCoursBySection($sec->getIdCours());
            
            // Vérifiez si $coursSec est un tableau ou une collection
            if (is_array($coursSec) || $coursSec instanceof \Traversable) {
                foreach ($coursSec as $course) {
                    // Ajout du cours au tableau sans doublon
                    $searchedcours[$course->getId()] = $course;
                }
            } else {
                // Gestion du cas où $coursSec n'est pas un tableau
                if ($coursSec) {
                    $searchedcours[$coursSec->getId()] = $coursSec;
                }
            }
        }
    }

    return array_values($searchedcours); // Retourne un tableau indexé pour les cours
}


    public function getCourseByKeyWordDepuisContent(string $mot4){
        $searched_content_cours = [];
        $searchedcours = [];
        $lectureContent = $this->lectureContentRepository->findAll();

         // Filtrage des contenus de lecture
         foreach ($lectureContent as $cont) {
            if (strpos($cont->getTitre(), $mot4) !== false 
                || strpos($cont->getDescription(), $mot4) !== false) {
                $searched_content_cours[$cont->getIdContent()] = $cont;
            }
        }
          // Récupération des cours par les contenus filtrés
          foreach ($searched_content_cours as $cont2) {
            $lec = $this->coursLectureRepository->find($cont2->getIdLecture());
            if ($lec) {
                // Récupération de la section associée à la lecture
                $sec = $this->coursSectionRepository->find($lec->getIdSection());
                if ($sec) {
                    // Récupération des cours associés à la section
                    $coursSec = $this->getCoursBySection($sec->getIdCours());
                    
                    // Vérifiez si $coursSec est un tableau ou une collection
                    if (is_array($coursSec) || $coursSec instanceof \Traversable) {
                        foreach ($coursSec as $course) {
                            // Ajout du cours au tableau sans doublon
                            $searchedcours[$course->getId()] = $course;
                        }
                    } else {
                        // Gestion du cas où $coursSec n'est pas un tableau
                        if ($coursSec) {
                            $searchedcours[$coursSec->getId()] = $coursSec;
                        }
                    }
                }
            }
        }
    
        // Retourne un tableau indexé pour les cours trouvés
        return array_values($searchedcours);
    }


    public function getCours(string $mot5){
    // Appel des méthodes de recherche avec le mot-clé
    $coursParMot1 = $this->getCourseBykeyWord($mot5);
    $coursParMot2 = $this->getCourseByKeyWordDepuisSections($mot5);
    $coursParMot3 = $this->getCourseByKeyWordDepuisLecture($mot5);
    $coursParMot4 = $this->getCourseByKeyWordDepuisContent($mot5);

    // Fusionner les résultats en un seul tableau, en utilisant l'ID du cours comme clé pour éviter les doublons
        $coursCombine = [];
    // Ajouter les résultats des différentes méthodes
     $coursCombine = array_merge($coursCombine, $coursParMot1);
     $coursCombine = array_merge($coursCombine, $coursParMot2);
     $coursCombine = array_merge($coursCombine, $coursParMot3);
     $coursCombine = array_merge($coursCombine, $coursParMot4);
 
     // Retourner la liste des cours sans doublons
     return $coursCombine;

        }



    
        public function getSubCateg4(?int $id)
        {
            if ($id === null) {
                // Handle the case where $id is null, e.g., return null or throw an exception
                return null; // or throw new \InvalidArgumentException('ID cannot be null');
            }
        
            $categ4 = $this->getCourseCategorie4();
        
            foreach ($categ4 as $cat) {
                if ($cat->getIdCateg4() == $id) {
                    return $cat;
                }
            }
        
            // Optionally handle the case where no category is found
            return null; // or throw new \Exception('Category not found');
        }

    
}