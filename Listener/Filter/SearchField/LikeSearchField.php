<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

use Doctrine\ORM\QueryBuilder;
use PP\AcmeBundle\Listener\Filter\SearchField\SearchFieldInterface;

class LikeSearchField extends SearchFieldAbstract
{

    public function addConditions(QueryBuilder $queryBuilder, $value)
    {
        $queryBuilder->andWhere("p.{$this->fieldName} LIKE :{$this->fieldName}")
                     ->setParameter($this->fieldName, '%' . $value . '%');

        return $queryBuilder;
    }

}