<?php namespace Trea\Twitter;
use Guzzle\Http\Client;

class Twitter {
	private $client;
	private $config;
	const VERSION = 0.1;
	const ENDPOINT = "https://api.twitter.com/1.1";

	function __construct(Config $details) {
		$this->config = $details;
		$this->client = new Client(self::ENDPOINT);
		$this->client->addSubscriber($details->configurePlugin());
	}

	function tweet($message) {
		$request = $this->client->post('statuses/update.json', null, array(
			'status' => $message
		));
		return $request->send()->json();
	}

	function version () {
		return self::VERSION;
	}
}