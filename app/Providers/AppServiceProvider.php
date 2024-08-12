<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = AliasLoader::getInstance();

        $loader->alias('ArrayHelper', \App\Helpers\ArrayHelper::class);
        $loader->alias('CheckHelper', \App\Helpers\CheckHelper::class);
        $loader->alias('ConstantHelper', \App\Helpers\ConstantHelper::class);
        $loader->alias('DateHelper', \App\Helpers\DateHelper::class);
        $loader->alias('FormatterHelper', \App\Helpers\FormatterHelper::class);
        $loader->alias('HashHelper', \App\Helpers\HashHelper::class);
        $loader->alias('MessageHelper', \App\Helpers\MessageHelper::class);
        $loader->alias('MetadataHelper', \App\Helpers\MetadataHelper::class);
        $loader->alias('RoleHelper', \App\Helpers\RoleHelper::class);
        $loader->alias('StorageHelper', \App\Helpers\StorageHelper::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::tokensExpireIn(now()->addDays(14));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
