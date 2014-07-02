<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

abstract class SearchFieldAbstract implements SearchFieldInterface
{
    protected $fieldName;

    protected $tableAlias;

    public function __construct($fieldName, $tableAlias)
    {
        $this->fieldName  = $fieldName;
        $this->tableAlias = $tableAlias;
    }

    public function getFieldName()
    {
        return $this->fieldName;
    }

    public function getTableAlias()
    {
        return $this->tableAlias;
    }
}
