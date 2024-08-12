<?php

return [
    // * Application Service Providers
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    App\Providers\TelescopeServiceProvider::class,
    App\Providers\ViewServiceProvider::class,

    // * Helper Service Providers
    App\Providers\ArrayHelperServiceProvider::class,
    App\Providers\CheckHelperServiceProvider::class,
    App\Providers\ConstantHelperServiceProvider::class,
    App\Providers\DateHelperServiceProvider::class,
    App\Providers\FormatterHelperServiceProvider::class,
    App\Providers\HashHelperServiceProvider::class,
    App\Providers\MessageHelperServiceProvider::class,
    App\Providers\MetadataHelperServiceProvider::class,
    App\Providers\RoleHelperServiceProvider::class,
    App\Providers\StorageHelperServiceProvider::class,

    // * Package Service Providers
    Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
    EloquentFilter\ServiceProvider::class,
    Maatwebsite\Excel\ExcelServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    Yajra\DataTables\DataTablesServiceProvider::class,
];
