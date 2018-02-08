<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blog\Category;
use AppBundle\Entity\Blog\Post;
use AppBundle\Service\Blog\PostService;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostFormController extends Controller{


    /** @var PostService $postService */
    protected $postService;

    private $logger;

    /**
     * HomeController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @Route("/postform", name="postform")
     */
    public function indexAction(Request $request)
    {
        if($request->getSession()->get("connected") == true){
            // create a task and give it some dummy data for this example
            $post = new Post();
            $categories = $this->postService->findAllCategory();
            $post->setCategories($categories);

            $form = $this->createFormBuilder($post)
                ->add('title', TextType::class)
                ->add('description', TextType::class)
                ->add('save', SubmitType::class, array('label' => 'Create post'))
                ->add('categories', ChoiceType::class, [
                    'choices' => $categories,
                    'choice_label' => function ($category, $key, $index) {
                        return strtoupper($category->getLibelle());
                    },
                    'multiple' => true,
                    'expanded' => true])
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $post = $form->getData();

                $categories = $post->getCategories();

                $post->setActive(true);
                $post->setCreatedAt(new \DateTime());

                foreach ($categories as $categ) {
                    $categ->addPost($post);
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($post);
                $em->flush();

                return $this->redirectToRoute('homepage');
            }

            return $this->render('Blog/postform.html.twig', array(
                'form' => $form->createView(),
            ));

        } else{
            return $this->redirectToRoute('loginform');
        }

    }
}
