<?php

namespace PP\AcmeBundle\Orm;

use Knp\Component\Pager\Paginator;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Orm\QueryBuilder;

class PaginationQueryResult implements QueryResultInterface
{

    /**
     * @var \Symfony\Component\HttpFoundation\Request
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
        $this->limitPerPage = $limitPerPage;
        $this->paginator    = $paginator;
    }

    public function getResult(QueryBuilder $query)
    {
        return $this->paginator->paginate(
            $query,
            $this->request->query->get('page', 1),
            $this->limitPerPage,
            $this->request->query->all()
        );
    }

}
