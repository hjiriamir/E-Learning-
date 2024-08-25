<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CourseService as ServiceCourseService;
use App\Service\Coaching\CoachingService;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;




class ContentPageController extends AbstractController
{
    private $sessionn;
    private $sessionn1;
    private $sessionn2;
    private $sessionn3;
    private $sessionn4;
    private $sessionn5;
    private $sessionn6;
    private $sessionn7;
    private $sessionn8;
    private $sessionn9;

    public function __construct(RequestStack $requestStack)
    {
        $this->sessionn = $requestStack->getSession();
        $this->sessionn1 = $requestStack->getSession();
        $this->sessionn2 = $requestStack->getSession();
        $this->sessionn3 = $requestStack->getSession();
        $this->sessionn4 = $requestStack->getSession();
        $this->sessionn5 = $requestStack->getSession();
        $this->sessionn6 = $requestStack->getSession();
        $this->sessionn7 = $requestStack->getSession();
        $this->sessionn8 = $requestStack->getSession();
        $this->sessionn9 = $requestStack->getSession();
    }

    #[Route('/course1', name: 'course1')]
    public function Contente(Request $request,Request $request1,ServiceCourseService $coursService,CoachingService $coachingService): Response{
        $vale = $request->query->get('levels', '');
       // $selectedLanguages = $request->query->get('languages');
        $coursesData = $coursService->getCoursesData();
        $amir = $request1->query->get('levels1', '');
           
        return $this->render('search/ContentPag.html.twig', [
            'coursess' => $coursesData,
            //'selectedLanguages' => $languagesArray,
            'vale' => $vale,
            'amir' => $amir
            

        ]);

    }


    private function getData1(): array
    {
        $selectedLevell = $this->sessionn1->get('global_status', 'default_values');
        return [
            
            "selectedLevell" => $selectedLevell,
  
        ];
    }


    #[Route('/content_page', name: 'content_page')]
    public function filterCourses(Request $request,ServiceCourseService $coursService, SessionInterface $sessionn1): JsonResponse
    {
       $vale = $request->query->get('levels', '');
       // $levels = "Beginner";
        /*$levelArray = explode(',', $levels); */
       
       //$vale="Bginner";
       $sessionn1->set('global_status', $vale);
       return new JsonResponse(['message' => 'Global status updated', 'global_status' => $vale]);
       /* return $this->render('search/ContentPag.html.twig', [
            'vale' => $vale,
            //'levels' => $levels,
            'coursess' => $coursesData,
        ]);*/
    }
}
