<?php

namespace spec\Labstag\Handler;

use Labstag\Handler\PostPublishingHandler;
use PhpSpec\ObjectBehavior;

class PostPublishingHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(PostPublishingHandler::class);
    }
}