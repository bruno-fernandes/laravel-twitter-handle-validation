<?php

namespace BrunoFernandes\LaravelTwitterHandleValidation\Tests;

use Orchestra\Testbench\TestCase;
use BrunoFernandes\LaravelTwitterHandleValidation\TwitterHandleValidator;

class TwitterHandleValidatorTest extends TestCase
{
    /** @test */
    public function test_valid_handles()
    {
        $validaHandles = ['@bruno', '@bruno_f', '@bruno123', '@12345'];

        foreach ($validaHandles as $handle) {
            $result = (new TwitterHandleValidator)->validate(null, $handle);
            $this->assertTrue($result);
        }
    }

    /** @test */
    public function test_invalid_handles()
    {
        $validaHandles = ['@bruno.f', '@ bruno_f', '@bruno 123', '@bruno-f', '@bruno-handle-too-long', '@br', '@1234', 'no-handle'];

        foreach ($validaHandles as $handle) {
            $result = (new TwitterHandleValidator)->validate(null, $handle);
            $this->assertFalse($result);
        }
    }
}
