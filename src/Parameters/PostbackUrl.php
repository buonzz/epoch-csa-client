<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* The postback url for a given transaction (Optional).
*/
class PostbackUrl implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'pburl';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if($value != null || strlen($value)==0){

			if(!filter_var($value, FILTER_VALIDATE_URL))
				throw new \InvalidArgumentException("pburl parameter in Epoch's Customer Search API needs to be a valid URL, ". $value . " given.");

		}

		return $value;
	}

}