<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* Set a retention based on a pi_code (Optional).
*/
class Picode implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'pi_code';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if(is_null($value) || strlen($value) == 0)
			throw new \InvalidArgumentException("pi_code parameter cannot be blank.");
		if(strlen($value) >= 255)
			throw new \InvalidArgumentException("pi_code parameter is way too long.");

		return $value;
	}

}