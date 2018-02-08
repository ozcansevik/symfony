<?php

namespace AppBundle\Service\Blog;
use AppBundle\Entity\Blog\Category;
use AppBundle\Entity\Blog\Post;
use AppBundle\Repository\Blog\PostRepository;
use Doctrine\ORM\EntityManagerInterface;

class PostService
{
    /** @var  EntityManagerInterface $em */
    private $em;

    /** @var PostRepository $repository */
    private $repository;

    /** @var PostRepository $repository */
    private $repositoryCategory;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->em = $manager;
        $this->repository = $this->em->getRepository(Post::class);
        $this->repositoryCategory = $this->em->getRepository(Category::class);
    }

    public function findAll(): array
    {
        return $this->repository->findBy(array(), array('createdAt' => 'DESC'));
    }

    public function findAllByCategory($category): array
    {
        return $this->repository->findByCategory($category);
    }

    public function findCategory($id){
        return $this->repositoryCategory->findById($id);
    }

    public function findAllCategory(): array
    {
        return $this->repositoryCategory->findAll();
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
