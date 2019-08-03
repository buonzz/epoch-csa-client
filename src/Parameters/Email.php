<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* Email address of the customer (Optional).  
*/
class Email implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'email';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if($value != null || $value<=0){

			if(!filter_var($value, FILTER_VALIDATE_EMAIL))
				throw new \InvalidArgumentException("email parameter in Epoch's Customer Search API needs to be a valid email, ". $value . " given.");

		}


		return $value;
	}

}