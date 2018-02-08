<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blog\Category;
use AppBundle\Service\Blog\PostService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DivertissementController extends Controller{


    /**
     * HomeController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @Route("/divertissement/{id}", name="divertissement")
     * @ParamConverter("category", class="AppBundle:Blog\Category")
     */
    public function indexAction(Request $request, Category $category)
    {
        $postList = $category->getPosts();

        $var = compact('postList');
        return $this->render('Blog/index.html.twig', $var);
    }
}
