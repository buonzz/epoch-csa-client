<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* additional comments associated with the action (Optional).
*/
class Comment implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'comment';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if(strlen($value) >= 255)
			throw new \InvalidArgumentException("comment parameter is way too long.");

		return $value;
	}

}