<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

use Doctrine\ORM\QueryBuilder;

class EqualSearchField extends SearchFieldAbstract
{

    public function addConditions(QueryBuilder $queryBuilder, $value)
    {
        $queryBuilder->andWhere("p.{$this->fieldName} = :{$this->fieldName}")
                     ->setParameter($this->fieldName, $value);

        return $queryBuilder;
    }

}