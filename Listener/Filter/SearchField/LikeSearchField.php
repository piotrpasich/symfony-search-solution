<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

use Doctrine\ORM\QueryBuilder;

class LikeSearchField extends SearchFieldAbstract
{

    public function addConditions(QueryBuilder $queryBuilder, $value)
    {
        $queryBuilder->andWhere("{$this->getTableAlias()}.{$this->getFieldName()} LIKE :{$this->getFieldName()}")
                     ->setParameter($this->getFieldName(), '%' . $value . '%');

        return $queryBuilder;
    }

}
