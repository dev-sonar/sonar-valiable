<?php
use Illuminate\Contracts\Container\Container;

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
        if (is_null($make)) {
            return Container::instance();
        }

        return Container::instance()->make($make, $parameters);
    }
}
