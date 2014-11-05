<?php

namespace Tee\Front\Tests;

use Tee\System\Tests\TestCase;

class InitializeTest extends TestCase {

    public function testSomethingIsTrue()
    {
        $this->assertTrue(\moduleEnabled('front'));
        $this->assertTrue(\moduleEnabled('system'));
    }

}