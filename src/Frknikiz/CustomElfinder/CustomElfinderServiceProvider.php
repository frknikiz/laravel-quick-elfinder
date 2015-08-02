<?php namespace Frknikiz\CustomElfinder;

use Illuminate\Support\ServiceProvider;

class CustomElfinderServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('frknikiz/laravel-quick-elfinder',"CustomElfinder");
        $this->app->register('Barryvdh\Elfinder\ElfinderServiceProvider');
		require __DIR__."../../../routes.php";
        \Config::addNamespace('laravel-quick-elfinder',__DIR__."../../../config");
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app["cfinder.pub"]=$this->app->share(function ($app)
        {
            return new Commands\CustomElfinderCommand();
        });
        $this->commands('cfinder.pub');

        $this->app['cfinder.util'] = $this->app->share(function ($app) {
            return new Cutil;
        });
        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Cutil', 'Frknikiz\CustomElfinder\Facades\CustomElfinderFacade');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array("cfinder.util");
	}

}
