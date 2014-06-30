<?php

namespace PP\AcmeBundle\Event;

use Doctrine\ORM\QueryBuilder;
use PP\AcmeBundle\Entity\Post;
use Symfony\Component\EventDispatcher\Event;

class PostEvent extends Event
{

    /**
     * @var \Doctrine\ORM\QueryBuilder
     */
    protected $query;

    /**
     * @var \PP\AcmeBundle\Entity\Post
     */
    protected $searchData;

    protected $propagation = true;

    public function __construct(QueryBuilder $query, Post $searchData)
    {
        $this->query = $query;
        $this->searchData = $searchData;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return \PP\AcmeBundle\Entity\Post
     */
    public function getSearchData()
    {
        return $this->searchData;
    }

    public function getResult()
    {
        if ($this->query instanceof QueryBuilder) {
            return $this->query->getQuery()->getResult();
        }

        return $this->query;
    }

    public function stopPropagation()
    {
        $this->propagation = false;
    }

    public function isPropagationStopped()
    {
        return ! $this->propagation;
    }
}