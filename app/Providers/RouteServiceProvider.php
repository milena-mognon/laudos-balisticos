<?php

namespace App\Providers;

use App\Models\Calibre;
use App\Models\Diretor;
use App\Models\Laudo;
use App\Models\Marca;
use App\Models\OrgaoSolicitante;
use App\Models\Origem;
use App\Models\Arma;
use App\Models\Secao;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

//        Route::model('origem', Origem::class);
//        Route::model('marca', Marca::class);
//        Route::model('calibre', Calibre::class);
        Route::model('secao', Secao::class);
//        Route::model('laudo', Laudo::class);
//        Route::model('revolver', Arma::class);
//        Route::model('diretor', Diretor::class);
//        Route::model('user', User::class);
//        Route::model('solicitante', OrgaoSolicitante::class);

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
