<?php

namespace AppBundle\Service\Blog;
use AppBundle\Entity\Blog\Post;
use AppBundle\Repository\Blog\PostRepository;
use Doctrine\ORM\EntityManagerInterface;

class PostService
{
    /** @var  EntityManagerInterface $em */
    private $em;

    /** @var PostRepository $repository */
    private $repository;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->em = $manager;
        $this->repository = $this->em->getRepository(Post::class);
    }

    public function findAll(): array
    {
        return $this->repository->findBy(array(), array('createdAt' => 'DESC'));
    }

    public function add(Post $post) {
        $this->em->persist($post);
        $this->em->flush();
    }

    public function drop()
    {
        $this->repository->drop();
    }
}
