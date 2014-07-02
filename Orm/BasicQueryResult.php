<?php

namespace PP\AcmeBundle\Orm;

use Doctrine\Orm\QueryBuilder;

class BasicQueryResult implements QueryResultInterface
{

    public function getResult(QueryBuilder $query)
    {
        return $query->getQuery()->getResult();
    }

}
