<?php

namespace AppBundle\Controller;

use AppBundle\Service\Blog\PostService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SportController extends Controller{


    /**
     * HomeController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @Route("/sport", name="sport")
     */
    public function indexAction(Request $request)
    {
        //$postList = $this->postService->findAllByCategoryId();

        $var = compact('postList');
        return $this->render('Blog/index.html.twig', $var);
    }
}
