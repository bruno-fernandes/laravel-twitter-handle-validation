<?php

namespace BrunoFernandes\LaravelTwitterHandleValidation\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use BrunoFernandes\LaravelTwitterHandleValidation\TwitterHandleRule;
use BrunoFernandes\LaravelTwitterHandleValidation\LaravelTwitterHandleValidationFacade;
use BrunoFernandes\LaravelTwitterHandleValidation\LaravelTwitterHandleValidationServiceProvider;


class CustomValidationTest extends TestCase
{
    use ValidatesRequests;

    protected function getPackageProviders($app)
    {
        return [
            LaravelTwitterHandleValidationServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaravelTwitterHandleValidation' => LaravelTwitterHandleValidationFacade::class
        ];
    }

    /** @test */
    public function test_valid_handles_using_rule()
    {
        $validator = Validator::make(['handle' => '@bruno'], ['handle' => resolve(TwitterHandleRule::class)]);

        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function test_invalid_handle_using_rule()
    {
        $validator = Validator::make(['handle' => '@ invalid'], ['handle' => resolve(TwitterHandleRule::class)]);

        $this->assertTrue($validator->fails());
    }

    /** @test */
    public function test_valid_handle_using_custom_validator()
    {
        $validator = Validator::make(['handle' => '@bruno'], ['handle' => 'twitter_handle']);

        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function test_invalid_handle_using_custom_validator()
    {
        $validator = Validator::make(['handle' => '@ invalid'], ['handle' => 'twitter_handle']);

        $this->assertTrue($validator->fails());
    }
}
