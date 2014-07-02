<?php

namespace PP\AcmeBundle\Service;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use PP\AcmeBundle\Event\PostEvent;
use PP\AcmeBundle\Entity\Post;
use PP\AcmeBundle\Orm\QueryResultInterface;

class PostProvider
{
    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $postRepository;

    /**
     * @var \PP\AcmeBundle\Orm\QueryResultInterface
     */
    protected $queryResult;

    public function __construct(EventDispatcherInterface $eventDispatcher, EntityRepository $postRepository, QueryResultInterface $queryResult)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->postRepository  = $postRepository;
        $this->queryResult     = $queryResult;
    }

    public function findAllBy(Post $searchData)
    {
        $query = $this->postRepository->createQueryBuilder('p');

        $event = new PostEvent($query, $searchData);
        $this->eventDispatcher->dispatch('pp.post.preQuery', $event);

        return $this->queryResult->getResult($query);
    }

}