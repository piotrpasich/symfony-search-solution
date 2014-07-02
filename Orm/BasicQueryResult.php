<?php

namespace PP\AcmeBundle\Service;

use Doctrine\Orm\QueryBuilder;
use PP\AcmeBundle\Orm\QueryResultInterface;

class BasicQueryResult implements QueryResultInterface
{

    public function getResult(QueryBuilder $query)
    {
        return $query->getQuery()->getResult();
    }

}
