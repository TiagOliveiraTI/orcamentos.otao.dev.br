<?php

namespace Tests;

use Otaodev\Orcamentos\Welcome;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Welcome::class)]
class WelcomeTest extends TestCase
{
    public function testShouldReturnHello(): void
    {
        $sut = new Welcome();

        $expect = "Hello!";
        $response = $sut->sayHello();

        $this->assertSame($expect, $response);
    }
}
