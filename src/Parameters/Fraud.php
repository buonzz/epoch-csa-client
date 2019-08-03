<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* send a flag to mark the order as fraudulent (Conditional). 
*/
class Fraud implements ApiParameterInterface {

	private $value;

	public function __construct($value = 'Y'){

		if(is_null($value) || strlen($value) == 0)
			$this->value = 'Y';
		else
			$this->value = $value;
	}

	public function getName(){
		return 'Fraud';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $value;		
	}

	public function validate($value){ return $value;}

}