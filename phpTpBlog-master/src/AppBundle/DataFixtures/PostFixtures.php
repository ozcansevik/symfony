<?php
    namespace AppBundle\DataFixtures;

    use AppBundle\Entity\Blog\Post;
    use AppBundle\Service\Blog\PostService;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;
    use Faker\Factory;

    class PostFixtures extends Fixture
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

        public function load(ObjectManager $manager)
        {
            // ----------------------------------
            // Create Fake Factory
            $faker = Factory::create();


            // ----------------------------------
            // Drop Database
            $this->postService->drop();

            for ($i = 0; $i < 20; $i++) {
                // ----------------------------------
                // Create Post
                $post = new Post();
                $post->setTitle($faker->text(20));
                $post->setDescription($faker->text());
                $post->setCreatedAt($faker->dateTime());
                $post->setActive($faker->boolean());

                // ----------------------------------
                // Persist Datas
                $this->postService->add($post);
            }
        }
    }