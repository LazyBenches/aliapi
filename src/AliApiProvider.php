<?php

namespace LazyBench\AliApi;

use Illuminate\Support\ServiceProvider;
use LazyBench\AliApi\Auth\Auth;

/**
 * Author:LazyBench
 * Date:2018/12/21
 */
class AliApiProvider extends ServiceProvider
{
    public function boot()
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/Config/config.php' => config_path('aliapi.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->app->singleton('aliApi', function ($app) {
            $config = ['appKey' => config('aliapi.appKey'), 'appSecret' => config('aliapi.appSecret')];
            return new Auth($config['appKey'], $config['appSecret']);
        });
    }

    public function providers()
    {
        return ['aliApi'];
    }
}