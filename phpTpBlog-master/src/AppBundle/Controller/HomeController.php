<?php

namespace AppBundle\Controller;

use AppBundle\Service\Blog\PostService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /** @var PostService $postService */
    protected $postService;

    /**
     * HomeController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $postList = $this->postService->findAll();

        $var = compact('postList');
        return $this->render('Blog/index.html.twig', $var);
    }

    /**
     * @Route("/home", name="homepageLogout")
     */
    public function homepageLogout(Request $request)
    {
        $postList = $this->postService->findAll();

        $var = compact('postList');

        $request->getSession()->set("connected", false);


        return $this->render('Blog/index.html.twig', $var);
    }
}
