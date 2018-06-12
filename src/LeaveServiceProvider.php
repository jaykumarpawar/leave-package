<?php
namespace Crazyboy\Leave;

use Crazyboy\Leave\Http\Middleware\packageauth;
use Illuminate\Support\ServiceProvider;

class LeaveServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'leave');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(
            __DIR__ . '/config/leave.php', 'leave'
        );
        // $this->publishes([
        //     __DIR__ . '/config/leave.php', config_path('leave.php'),
        // ]);
        $this->publishes([
            __DIR__ . '/resources' => public_path('leave/resources'),
            __DIR__ . '/database/migrations' => $this->app->databasePath() . '/migrations',
            __DIR__ . '/database/seeds' => $this->app->databasePath() . '/seeds',
        ], 'leave');
    }

    public function register()
    {
        $this->app['router']->aliasMiddleware('packageauth', packageauth::class);
        $this->app['router']->aliasMiddleware('web', [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
        $this->app['router']->aliasMiddleware('auth', \Illuminate\Auth\Middleware\Authenticate::class);
        $this->app['router']->aliasMiddleware('auth.basic', \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class);
        $this->app['router']->aliasMiddleware('bindings', \Illuminate\Routing\Middleware\SubstituteBindings::class);
        $this->app['router']->aliasMiddleware('cache.headers', \Illuminate\Http\Middleware\SetCacheHeaders::class);
        $this->app['router']->aliasMiddleware('can', \Illuminate\Auth\Middleware\Authorize::class);
        $this->app['router']->aliasMiddleware('guest', \App\Http\Middleware\RedirectIfAuthenticated::class);
        $this->app['router']->aliasMiddleware('signed', \Illuminate\Routing\Middleware\ValidateSignature::class);
        $this->app['router']->aliasMiddleware('throttle', \Illuminate\Routing\Middleware\ThrottleRequests::class);
    }
}
