<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

use Doctrine\ORM\QueryBuilder;

class EqualSearchField extends SearchFieldAbstract
{

    public function addConditions(QueryBuilder $queryBuilder, $value)
    {
        $queryBuilder->andWhere("{$this->getTableAlias()}.{$this->getFieldName()} = :{$this->getFieldName()}")
                     ->setParameter($this->getFieldName(), $value);

        return $queryBuilder;
    }

}
