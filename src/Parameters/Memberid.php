<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* Member ID assigned by Epoch. 
*/
class Memberid implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$value = (int) $value;
		$this->setValue($value);
	}

	public function getName(){
		return 'member_id';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if($value <= 0)
				throw new \InvalidArgumentException("member_id parameter in Epoch's Customer Search API needs to be non-zero, 0 given.");

		if($value != null || strlen($value)<=0){

			if(!is_int($value))
				throw new \InvalidArgumentException("member_id parameter in Epoch's Customer Search API needs to be an integer, blank or null given.");

		}


		return $value;
	}

}