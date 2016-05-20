<?php
use Sonar\Valiable\Valiable;
//use Mockery;

if (! function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param  string  $make
     * @param  array   $parameters
     * @return mixed|\Illuminate\Foundation\Application
     */
    function app($make = null, $parameters = [])
    {
        $mock = \Mockery::mock(Valiable::class);
        $mock->shouldReceive('getValue')->andReturn(null);
        $mock->shouldReceive('get')->andReturn(null);
        $mock->shouldReceive('get')->andReturn(null);
        return $mock;
    }
}
