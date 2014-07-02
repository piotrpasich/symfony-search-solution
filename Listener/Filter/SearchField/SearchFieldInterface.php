<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

use Doctrine\ORM\QueryBuilder;

interface SearchFieldInterface
{

    public function getFieldName();

    public function getTableAlias();

    public function addConditions(QueryBuilder $queryBuilder, $value);

}
