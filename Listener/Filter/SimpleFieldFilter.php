<?php

namespace PP\AcmeBundle\Listener\Filter;

use PP\AcmeBundle\Event\PostEvent;
use PP\AcmeBundle\Listener\Filter\SearchField\SearchFieldInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use PP\AcmeBundle\Listener\Filter\PostFilterListenerInterface;
use InvalidArgumentException;

class SimpleFieldFilter implements PostFilterListenerInterface
{
    /**
     * @var SearchField\SearchFieldInterface[]
     */
    protected $searchFields = array();

    public function addSearchField(SearchFieldInterface $searchField)
    {
        $this->searchFields[] = $searchField;
    }

    public function filter(PostEvent $postEvent)
    {
        $searchData = $postEvent->getSearchData();

        foreach ($this->searchFields as $searchField) {
            $searchDataMethodName = "get{$searchField->getFieldName()}";

            if ($searchData->$searchDataMethodName()) {
                $searchField->addConditions($postEvent->getQuery(), $searchData->$searchDataMethodName());
            }
        }
    }
}
