<?php

namespace PP\AcmeBundle\Entity;

use Doctrine\DBAL\Events;
use Doctrine\ORM\EntityRepository;
use Knp\Component\Pager\Paginator;
use Knp\Bundle\PaginatorBundle\Definition\PaginatorAwareInterface;
use PP\AcmeBundle\Event\PostEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\Tests\Debug\EventSubscriber;

class PostRepository extends EntityRepository
{

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function setDispatcher(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function findAllBy(Post $searchData)
    {
        $query = $this->createQueryBuilder('p');

        $event = new PostEvent($query, $searchData);
        $this->dispatcher->dispatch('pp.post.preQuery', $event);

        return $event->getResult();
    }

}
