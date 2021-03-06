<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;

class EventPlannerRouteServiceProvider extends RouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers\EventPlanner';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map()
    {
    	parent::map();
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
        Route::group([
            'namespace' => $this->namespace, 'middleware' => 'eventplanner',
        ], function () {
            require base_path('routes/eventplanner.php');
        });
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
    	Route::group([
    			'middleware' => 'eventplanner_api',
    			'namespace' => $this->namespace,
    			'prefix' => 'api',
    	], function () {
    		require base_path('routes/eventplanner_api.php');
    	});
    }
}
