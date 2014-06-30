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
    protected $searchFields;

    public function __construct()
    {
        if (func_get_args() != array_filter(func_get_args(), function($element) { return $element instanceof SearchFieldInterface; } )) {
            throw new InvalidArgumentException('One of argument passed to SimpleFieldFilter is not instance of SearchFieldInterface');
        }

        $this->searchFields = func_get_args();
    }

    public function filter(PostEvent $postEvent)
    {
        if ($postEvent->isPropagationStopped()) {
            return;
        }

        $searchData = $postEvent->getSearchData();

        foreach ($this->searchFields as $searchField) {
            $searchDataMethodName = "get{$searchField->getFieldName()}";

            if ($searchData->$searchDataMethodName()) {
                $searchField->addConditions($postEvent->getQuery(), $searchData->$searchDataMethodName());
            }
        }
    }
}
