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

class LoginFormController extends Controller{


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
     * @Route("/loginform", name="loginform")
     */
    public function indexAction(Request $request)
    {
        $request->getSession()->set("connected", false);

        return $this->render('Blog/loginform.html.twig', array(

        ));
    }

    /**
     * @Route("/loginForm", name="loginForm")
     * @param Request $request
     */
    public function loginAction(Request $request)
    {
        $username = $request->get("uname");

        $password = $request->get("psw");

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT u FROM AppBundle:Blog\User u WHERE u.username = :username ')->setParameter('username', $username);
        $user = $query->getResult();

        if($user != null) {
            if ($user[0]->getPassword() == $password) {
                $connected = true;
                $request->getSession()->set("connected", true);
                return $this->redirectToRoute('postform');
            } else {
                $request->getSession()->set("connected", false);
            }
        }
        return $this->render('Blog/loginform.html.twig', array());
    }
}
