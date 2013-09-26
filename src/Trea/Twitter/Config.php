<?php namespace Trea\Twitter;
use Guzzle\Plugin\Oauth\OauthPlugin;

class Config {
	private $details;
	private $model = false;

	
	/**
	 * Sets the name of the Model/Class that should implement the 
	 * logic of determining the current user's Twitter token
	 * @param  String $modelName Model Name (including Namespace)
	 * @return $this
	 */
	function setModel($modelName) {
		$this->model = $modelName;
		return $this;
	}

	function get($key) {
		return $this->details[$key];
	} 
	/**
	 * Sets config items on $details array for setting up OAuth plugin
	 * @param String $key   Key on $details to set
	 * @param String $value Value to set for $details[$key]
	 */
	function set($key, $value) {
		$this->details[$key] = $value;
		return $this;
	}

	/**
	 * Makes sure that the Callable model is provided so that
	 * the full configuration is available and returns the plugin
	 * @return OauthPlugin
	 */
	function configurePlugin() {
		return new OauthPlugin($this->details);
	}

	function __toArray() {
		return $this->details;
	}
}