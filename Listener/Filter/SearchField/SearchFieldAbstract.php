<?php

namespace PP\AcmeBundle\Listener\Filter\SearchField;

abstract class SearchFieldAbstract implements SearchFieldInterface
{
    protected $fieldName;

    protected $tableAlias;

    public function __construct($tableAlias, $fieldName)
    {
        $this->tableAlias = $tableAlias;
        $this->fieldName  = $fieldName;
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
