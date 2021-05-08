<?php

namespace App\Providers;

use App\Service\CloudinaryService;
use Cloudinary\Cloudinary;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() == 'local') {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        // \Cloudinary::config(array(
        //     "cloud_name" => "dzjdn589g",
        //     "api_key" => env("CLOUD_IMG_KEY","913728663371981"),
        //     "api_secret" => env("CLOUD_IMG_SECRETE", "YdkY6SmwMXswvXpgjfjG9dCik6A")
        // ));

        $this->app->singleton(CloudinaryService::class, function ($app) {
            $config = config('project.cloudinary');
            return new CloudinaryService(new Cloudinary($config));
        });

        if (env('APP_ENV') != 'local') {
            $url->forceScheme('https');
        }
    }
}
