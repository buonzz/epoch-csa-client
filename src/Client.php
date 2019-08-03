<?php 

namespace Buonzz\Epoch\CustomerSearch;

use Buonzz\Epoch\CustomerSearch\Parameters\Username;
use Buonzz\Epoch\CustomerSearch\Parameters\Password;
use GuzzleHttp\Client as GuzzleClient;

class Client{

	private $username = null;
	private $password = null;	
	private $url = null;
	public $current_querystring;
	public $current_raw_response;

	public function __construct($username, $password, $url = null){

		$this->username = new Username($username);
		$this->password = new Password($password);
		$this->url = !is_null($url)? $url : ApiConstants::API_URL;

	}

	public function build_uri($action, $parameters){

		$action->validate_params($parameters);

		$action_name = $action->getName();

		$kv = [
			'api_action' => $action_name,
			'auth_user' => $this->username->getValue(),
			'auth_pass' => $this->password->getValue()
		];

		foreach($parameters as $parameter){
			$kv[$parameter->getName()] = $parameter->getValue();
		}

		$url_call  = $this->url . '?' . http_build_query($kv);

		return $url_call;

	}

	public function execute($action, $parameters){

		$client = GuzzleClient();
		
		$uri = $this->build_uri($action, $parameters);

		// expose this so the user of the package can inspect it
		$this->current_querystring = $uri;
		
		$response = $client->request('GET', $uri);
		$body = $response->getBody();

		// expose the response from api, so the user of the package can inspect
		$this->current_raw_response = $body;

		$parsed_xml = new \SimpleXMLElement($body);

		return $parsed_xml;
	} // 
}