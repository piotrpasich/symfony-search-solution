<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

use Doctrine\ORM\QueryBuilder;
use PP\AcmeBundle\Listener\Filter\SearchField\SearchFieldInterface;

abstract class SearchFieldAbstract implements SearchFieldInterface
{
    protected $fieldName;

    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
    }

    public function getFieldName()
    {
        return $this->fieldName;
    }

}