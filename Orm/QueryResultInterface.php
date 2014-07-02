<?php
namespace PP\AcmeBundle\Orm;

use Doctrine\Orm\QueryBuilder;

interface QueryResultInterface
{

    public function getResult(QueryBuilder $query);

}