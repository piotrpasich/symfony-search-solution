<?php

namespace PP\AcmeBundle\Listener\Filter;

use PP\AcmeBundle\Event\PostEvent;

interface PostFilterListenerInterface
{

    public function filter(PostEvent $postEvent);

}
