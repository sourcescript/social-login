<?php namespace Mataps\SocialLogin;

use Illuminate\Support\ServiceProvider;
use Mataps\SocialLogin\Repo\UserRepositoryInterface;
use Mataps\SocialLogin\Repo\UserEloquentRepository;

class SocialServiceProvider extends ServiceProvider {

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
		$this->package('mataps/social-login');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Mataps\UserLogin\User\Repo\UserRepositoryInterface',
			'Mataps\UserLogin\User\Repo\EloquentUserRepository'
		);

		$this->app->bind(
			'Mataps\UserLogin\User\UserInterface',
			'Mataps\UserLogin\User\User'
		);

		$this->app['social'] = $this->app->share(function($app)
		{
			$user = $this->app->make('Mataps\UserLogin\User\UserInterface');

			$app['social.loaded'] = true;

			return new Social($user);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}