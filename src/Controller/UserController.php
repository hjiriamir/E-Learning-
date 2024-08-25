<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;
use App\Entity\Langages;
use App\Entity\LangagesNiveau;
use App\Entity\UserCountry;
use App\Entity\Contributor;
use App\Entity\ContributorCurrentSituation;
use App\Entity\ContributorCertification;
use App\Entity\ContributorEducation;
use App\Entity\UserLangages;
use Symfony\Component\HttpFoundation\JsonResponse;
use DateTime;


#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/Profileuser', name: 'app_Profile_user')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {   $id = $request->getSession()->get('user_id');
        $user = $em->getRepository(Users::class)->findOneBy(['id' => $id]);
        $userlang = $em->getRepository(UserLangages::class)->findBy(['idUser' => $id]);
        $langes=[];
        foreach ($userlang as $langue) {
            $lang = $em->getRepository(Langages::class)->findOneBy(['idLangage' => $langue->getIdLangage()]);
            $niv = $em->getRepository(LangagesNiveau::class)->findOneBy(['idNiveau' => $langue->getIdNiveau()]);
            $langes[] =[
            'Langue'=> $lang->getLabel(),
            'niveau' => $niv->getLabel()
        ];
        }
        return $this->render('user/index.html.twig',[
            'firstname' => $user->getFirstname(),
            'lastename' => $user->getLastname(),
            'pathimg' => $user->getPhoto(),
            'pathcv' => $user->getCv(),
            'user' => $user,
            'languages' => $langes 
        ]);
    }


    #[Route('/add_user', name: 'app_add_user')]
    public function profile(EntityManagerInterface $em ,Request $request): Response
    {   
        $userId = $request->getSession()->get('user_id');
        $user = $em->getRepository(Users::class)->findOneBy(['id' => $userId]);
        $Langages = $em->getRepository(Langages::class)->findAll();
        $LangagesNiveau = $em->getRepository(LangagesNiveau::class)->findAll();
        $Country = $em->getRepository(UserCountry::class)->findAll();
        $Situation = $em->getRepository(ContributorCurrentSituation::class)->findAll();
        
        return $this->render('user/add_user.html.twig',[
            
        'languages'=>$Langages,
        'LangagesNiveau'=>$LangagesNiveau,
        'Country'=>$Country,
        'Situations'=>$Situation,
        'User'=>$user,
        ]);
    }
    #[Route('/save_proposuser', name: 'app_user_save_proposuser', methods: ['GET','POST'])]
    public function save_proposuser(EntityManagerInterface $em,Request $request): Response
    {
        if ($request) {
            $id = $request->getSession()->get('user_id');
            $user = $em->getRepository(Users::class)->findOneBy(['id' => $id]);
            $code_user = $user->getCodeuser();
         
                $firstname = $request->get('prenom');
                $lastname = $request->get('nom');
                $Psoeudo = $request->get('Psoeudo');
                $gmail = $request->get('gmail');
                $facebook = $request->get('facebook');
                $linkedin = $request->get('Linkedin');
                $siteweb = $request->get('siteweb');
                $langues = $request->get('selected_language');
                $levels =  $request->get('selected_level');
                $experience = $request->get('experience');
                $situations = $request->get('situations');
                $newlangue = $request->get('newlanguage');
                $newlevel =  $request->get('newlevel');
                $Subjecttaught = $request->get('Subjecttaught');
                $Country =  $request->get('selected_country');
                $Timezone = $request->get('selected_Timezone');
                // $request->get('langue');
                //dd($user);  
              if (!empty($newlangue) && !empty($newlevel)) {
                      foreach ($newlangue as $key => $language) {
                        $Langage = new Langages();
                        $Langage->setLabel($language);
                        $em->persist($Langage);
                        $em->flush();
        
                    $idL = $Langage->getIdLangage();
        
                    $Niveau = new LangagesNiveau();
                    $Niveau->setLabel($newlevel[$key]); // Set the corresponding level
                    $Niveau->setIdLangage($idL);
                    $em->persist($Niveau);
                    $em->flush();
            
                // Set the new language and level values
                $langue[] = $idL;
                $level[] = $Niveau->getIdNiveau();
            }
        }
        
        $user->setFirstname(!empty($firstname) ? $firstname : $user->getFirstname());
        $user->setLastname(!empty($lastname) ? $lastname : $user->getLastname());
        $user->setPsoeudo(!empty($Psoeudo) ? $Psoeudo : $user->getPsoeudo());
        $user->setGmailcompte(!empty($gmail) ? $gmail : $user->getGmailcompte());
        $user->setFacebook(!empty($facebook) ? $facebook : $user->getFacebook());
        $user->setLinkedin(!empty($linkedin) ? $linkedin : $user->getLinkedin());
        $user->setSiteweb(!empty($siteweb) ? $siteweb : $user->getSiteweb());
        $user->setIdcountry(!empty($Country) ? $Country : $user->getIdcountry());
        $user->setIdtimezone(!empty($Timezone) ? $Timezone : $user->getIdtimezone());

                   if(!empty($langues)&&!empty($levels))
                   { 
                    foreach ($langues as $key =>$langue) {
                           $userlang = new UserLangages();
                           $userlang->setIdUser($id);
                               $userlang->setIdLangage($langue);
                               $userlang->setIdNiveau($levels[$key]);
                               $em->persist($userlang);
                            $em->flush();

                    }
                }
                    //$user->setLangue(implode(',', $langue));
                    //$user->setLangueniveau(implode(',', $level));
                    
                  
                    $contributor =  $em->getRepository(Contributor::class)->findOneBy(['idUser' => $id]);
                 if(!$contributor){
                    $contributor = new Contributor();
                     $contributor->setIdUser($id);    
                    }
                    
                   
                    $contributor->setEnseignementExperience($experience);
                    $contributor->setIdCurrentSituation(implode(',', $situations));
                    $contributor->setMatiereEnseignee(implode(',', $Subjecttaught));

                    // Save the updated user entity
                    $em->persist($user);
                    $em->flush();
                    $em->persist($contributor);
                    $em->flush();
                
                    $idContributor = $contributor->getId();
                    $sess = $request->getSession();
                    $sess->set('id_contributor', $idContributor);
                    $result = true;
                if (!is_null($result)) {
                    $status = array('status' => "Success");
                } else {
                    $status = array('status' => "Error", 'error' => 'Error inserting data');
                }

                return new JsonResponse($status);
            }

    return new JsonResponse(array('status' => "Error", 'error' => 'Invalid request method'));
}

#[Route("/save_photo", name:"app_user_save_photo", methods: ['GET','POST'])]
    public function Savephoto(Request $request,EntityManagerInterface $em): Response
    {
        
        if ($request) {
            $id = $request->getSession()->get('user_id');
            $user = $em->getRepository(Users::class)->findOneBy(['id' => $id]);
            $code_user = $user->getCodeuser();
         
         $file_img = $request->files->get('photo');
        //dump($file_img .'test');
         
         //dd($file_img ,$user);  
        // user/id_user/image/  
        $filename_img = uniqid().".".$file_img->getClientOriginalExtension();

        $directory = 'vendor/hatlone/user/' ;
        $userDirectory =  $directory . $id . '/image'; 
        $filePath = $userDirectory . '/' . $filename_img;
        
        if (!file_exists($userDirectory)) {
            mkdir($userDirectory, 0777, true);
        }
        
        if (is_dir($userDirectory)) {
            $file_img->move($userDirectory, $filename_img);
            $user->setPhoto($filePath);     
        }

            $em->persist($user);
            $em->flush();
            $result = true;
        }

        if (!is_null($result)){
            $status = array('status' => 'Success', 'photoPath' => $request->getUriForPath($user->getPhoto()));


             } else {
                 $status = array('status' => "Error", 'error' => 'Error inserting data');
             }
     
             return new JsonResponse($status);
    }
    #[Route("/save_description ", name:"app_user_save_description", methods: ['GET','POST'])]

    public function saveDescription(Request $request,EntityManagerInterface $em): Response
    {
        // Retrieve the form data from the request
        $status = array();
        $userId = $request->getSession()->get('user_id'); 
        if ($request) {
            $id = $request->getSession()->get('id_contributor');
            $contributor =  $em->getRepository(Contributor::class)->findOneBy(['idUser' => $userId]);
        $headline = $request->get('headline');
        $introduction = $request->get('introduction');
        $experience = $request->get('experience');
        $motivation = $request->get('motivation');
        $file_cv = $request->files->get('cvupload');
               // dd($request);
               if ($file_cv && is_uploaded_file($file_cv->getPathname())) {
                $user = $em->getRepository(Users::class)->findOneBy(['id' => $userId]);
                $filename_cv=uniqid().".".$file_cv->getClientOriginalExtension();

        $directory = 'vendor/hatlone/user/' ;
        $userDirectory =  $directory . $userId . '/doc'; 
        $filePath = $userDirectory . '/' . $filename_cv;

        if (!file_exists($userDirectory)) {
            mkdir($userDirectory, 0777, true);
        }
        
        if (is_dir($userDirectory)) {
            $file_cv->move($userDirectory, $filename_cv);
            $user->setCv($filePath);  
            $em->persist($user);
            $em->flush();   
        }
    }
            if(!$contributor){
              $contributor = new Contributor();
              $contributor->setIdUser($userId);    
            }
         $contributor->setHeadLine($headline);
         $contributor->setDescription($introduction);
         $contributor->setDescribtionTeachingExperience($experience);
         $contributor->setMotivateStudentsToRead($motivation);
         $contributor->setCv($filePath);

         $em->persist($contributor);
            $em->flush();

    } else {
        $status['status'] = 'Error';
        $status['error'] = 'Video file not found';
    }

    return new JsonResponse($status);
    }
#[Route("/save_video", name:"app_user_save_video", methods: ['GET','POST'])]
public function saveVideo(Request $request,EntityManagerInterface $em): Response
{
    $status = array();
     
    // Check if the request contains the "video" file
    if ($request) {
       // $videorec = $request->files->get('video');
        $videoFile = $request->files->get('videoupload');
        $videothumbnail = $request->files->get('thumbnail');

        $userId = $request->getSession()->get('user_id'); 
        $user = $em->getRepository(Users::class)->findOneBy(['id' => $userId]);

        // Generate a unique filename
        $videofilename = uniqid() . '.' . $videoFile->getClientOriginalExtension();
        $thumbnailfilename = uniqid() . '.' . $videothumbnail->getClientOriginalExtension();

      
        $directory = 'vendor/hatlone/user/' ; 
        $userDirectory =  $directory . $userId . '/video'; 
        $thumbnailDirectory =  $directory . $userId . '/thumbnail';
        $videofilePath = $userDirectory . '/' . $videofilename;
        $thumbnailfilePath = $thumbnailDirectory . '/' . $thumbnailfilename;


        // Create the user directory if it doesn't exist
        if (!file_exists($userDirectory)) {
            mkdir($userDirectory, 0777, true);
        }
        if (!file_exists($thumbnailDirectory)) {
            mkdir($thumbnailDirectory, 0777, true);
        }

        // Move the uploaded video file to the desired location

        // Save the video file path or perform any additional logic as required
        if (is_dir($thumbnailDirectory) && is_dir($userDirectory)) {
            $videoFile->move($userDirectory, $videofilename);
            $videothumbnail->move($thumbnailDirectory, $thumbnailfilename);
            $user->setVideoDescriptive($videofilePath);     
            $user->setImageVideo($thumbnailfilePath);                   
        }
      

// Save the updated user entity
$em->persist($user);
$em->flush();
        $status['status'] = 'Success';
        $status['file_path'] = $videofilePath; // Optionally, you can include the file path in the response
    } else {
        $status['status'] = 'Error';
        $status['error'] = 'Video file not found';
    }

    return new JsonResponse($status);
}

#[Route("/save_tutoring_subjects", name:"app_user_save_tutoring_subjects", methods: ['GET','POST'])]
public function saveTutoringSubjects(Request $request,EntityManagerInterface $em)
{
    // Process the form data
    $status = array();
        $userId = $request->getSession()->get('user_id'); 
        if ($request) {
            $id = $request->getSession()->get('id_contributor');
            $contributor =  $em->getRepository(Contributor::class)->findOneBy(['idUser' => $userId]);
            $yearsOfExperience = $request->get('yearsOfExperience');
            $proficiencyLevels = $request->get('proficiencyLevels');
            $ageGroups = $request->get('ageGroups');

            if(!$contributor){
              $contributor = new Contributor();
              $contributor->setIdUser($id);    
            }
            
            // Set the values on the contributor object
            $contributor->setYearsOfExperience($yearsOfExperience);
            $contributor->setStudentProficiencyLevel(implode(',', $proficiencyLevels));
            $contributor->setPreferredAgeGroup(implode(',', $ageGroups));
                    
            $em->persist($contributor);
            $em->flush();
 
    $status['status'] = 'Success'; // Optionally, you can include the file path in the response
} else {
    $status['status'] = 'Error';
    $status['error'] = 'Video file not found';
}

return new JsonResponse($status);
}


#[Route("/save_certification_data", name: "app_user_save_certification_data", methods: ['GET', 'POST'])]
public function saveCertification(Request $request, EntityManagerInterface $em)
{
    $status = array();
    $userId = $request->getSession()->get('user_id');

    if ($request->isMethod('POST')) {
        $certifications = $request->getContent();
        $certifications = json_decode($certifications, true);

        foreach ($certifications as $certificationData) {
            $certification = new ContributorCertification();
            $certification->setIdUser($userId);

            $subject = $certificationData['subject'];
            $certificate = $certificationData['certificate'];
            $description = $certificationData['description'];
            $issuedBy = $certificationData['issuedBy'];
            $debutYear = $certificationData['debutYear'];
            $finYear = $certificationData['finYear'];

            $certification->setTitre($subject);
            $certification->setDomaine($certificate);
            $certification->setDescription($description);
            $certification->setIssuedBy($issuedBy);
            $certification->setDateDeb($debutYear);
            $certification->setDateFin($finYear);
            $certification->setDateOperation(new \DateTime());

            $em->persist($certification);
        }

        $em->flush();

        $status['status'] = 'Success';
    } else {
        $status['status'] = 'Error';
        $status['error'] = 'Invalid request';
    }

    return new JsonResponse($status);
}


#[Route("/save_education_data", name: "app_user_save_education_data", methods: ['POST'])]
public function saveEducation(Request $request, EntityManagerInterface $em): JsonResponse
{
    $status = [];

    $userId = $request->getSession()->get('user_id');

    $educationsData = $request->get('educations');
    $educations = $educationsData;
    var_dump($educations);

    if (empty($educations)) {
        $status['status'] = 'Error';
        $status['error'] = 'No education data found.';
        return new JsonResponse($status);
    }

    try {
        foreach ($educationsData as $key => $educationData) {
            $educationData = json_decode($educationData, true);
            $education = new ContributorEducation();

            $education->setIdUser($userId);
            $education->setUniversite($educationData['university']);
            $education->setDiplome($educationData['degree']);
            $education->setDomaine($educationData['specialization']);
            $education->setTypeDiplome($educationData['degreeType']);
            $education->setDateDeb($educationData['debutYear']);
            $education->setDateFin($educationData['finYear']);
            $education->setDateOperation(new \DateTime());

            $diploma = $request->files->get('diploma')[$key];

            if ($diploma) {
                $filename = uniqid() . '.' . $diploma->getClientOriginalExtension();
                $directory = 'vendor/hatlone/user/';
                $userDirectory = $directory . $userId . '/diplome';
                $filePath = $userDirectory . '/' . $filename;
            
                // Create the user directory if it doesn't exist
                if (!file_exists($userDirectory)) {
                    mkdir($userDirectory, 0777, true);
                }
            
                if (is_dir($userDirectory)) {
                    $diploma->move($userDirectory, $filename);
                    $education->setDiplomePath($filePath);
                }
            }
            

            $em->persist($education);
            $em->flush();
        }

        $status['status'] = 'Success';
        $status['message'] = 'Education data saved successfully.';
    } catch (\Exception $e) {
        $status['status'] = 'Error';
        $status['error'] = 'Failed to save education data. Please try again.';
    }

    return new JsonResponse($status);
}
}
