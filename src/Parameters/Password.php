<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* Password assigned to the customer service agent
*/
class Password implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'auth_pass';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if($value == null)
			throw new \InvalidArgumentException("auth_pass parameter in Epoch's Customer Search API is required, null given.");

		if(strlen($value) == 0)
			throw new \InvalidArgumentException("auth_pass parameter in Epoch's Customer Search API is required, empty string given.");

		if(strlen($value) >= 255)
			throw new \InvalidArgumentException("auth_pass parameter is way too long.");

		return $value;
	}

}