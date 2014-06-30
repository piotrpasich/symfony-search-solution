<?php

namespace PP\AcmeBundle\Listener;

use Knp\Component\Pager\Paginator;
use PP\AcmeBundle\Event\PostEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class PaginationListener
{

    /**
     * @var null|\Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @var \Knp\Component\Pager\Paginator
     */
    protected $paginator;

    /**
     * @var int
     */
    protected $limitPerPage;

    public function __construct(RequestStack $requestStack, Paginator $paginator, $limitPerPage = 10)
    {
        $this->request      = $requestStack->getMasterRequest();
        $this->paginator    = $paginator;
        $this->limitPerPage = $limitPerPage;
    }

    /**
     * @param PostEvent $postEvent
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */
    public function preLoad(PostEvent $postEvent)
    {
        if ($postEvent->isPropagationStopped()) {
            return;
        }

        $query = $postEvent->getQuery();

        $postEvent->setQuery( $this->paginator->paginate(
            $query,
            $this->request->query->get('page') ? $this->request->query->get('page') : 1,
            $this->limitPerPage,
            $this->request->query->all()
        ) );

        $postEvent->stopPropagation();
    }

}