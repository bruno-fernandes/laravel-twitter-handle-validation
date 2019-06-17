<?php

namespace BrunoFernandes\LaravelTwitterHandleValidation\Tests;

use Orchestra\Testbench\TestCase;
use BrunoFernandes\LaravelTwitterHandleValidation\LaravelTwitterHandleValidation;

class LaravelTwitterHandleValidationTest extends TestCase
{
    /** @test */
    public function test_valid_handle()
    {
        $result = resolve(LaravelTwitterHandleValidation::class)->isValid('@bruno');
        $this->assertTrue($result);
    }

    /** @test */
    public function test_invalid_handle()
    {
        $result = resolve(LaravelTwitterHandleValidation::class)->isValid('@ invalid');
        $this->assertFalse($result);
    }
}
