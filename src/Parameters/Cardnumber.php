<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* First 4 and the last 4 of the card number (Optional).
*/
class Cardnumber implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'cardnum';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if($value != null || $value<=0){

			if(!is_int($value))
				throw new \InvalidArgumentException("cardnum parameter in Epoch's Customer Search API needs to be an integer, ". $value . " given.");

		}


		if($value > 9999)
			throw new \InvalidArgumentException("cardnum parameter in Epoch's Customer Search API needs cant be larger than 4 digits number, ". $value . " given.");

		return $value;
	}

}