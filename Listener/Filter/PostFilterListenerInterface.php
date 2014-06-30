<?php

namespace PP\AcmeBundle\Listener\Filter;

use PP\AcmeBundle\Event\PostEvent;
use Symfony\Component\HttpFoundation\RequestStack;

interface PostFilterListenerInterface
{

    public function filter(PostEvent $postEvent);

}