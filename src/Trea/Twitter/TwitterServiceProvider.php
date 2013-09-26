<?php namespace Trea\Twitter;

use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['twitter'] = function() {
			$details = new Config;
			$details->set('consumer_key', \Config::get('twitter.consumer_key'));
			$details->set('consumer_secret', \Config::get('twitter.consumer_secret'));
			$details->set('token', \Config::get('twitter.access_key'));
			$details->set('token_secret', \Config::get('twitter.access_secret'));
			return new Twitter($details);
		};
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