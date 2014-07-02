<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

use Doctrine\ORM\QueryBuilder;

interface SearchFieldInterface
{

    public function getFieldName();

    public function addConditions(QueryBuilder $queryBuilder, $value);

}
