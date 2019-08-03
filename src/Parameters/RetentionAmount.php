<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

/**
* Set a different the retention price (Optional).
*/
class RetentionAmount implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'retention_amount';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if($value != null || $value<=0){

			if(!is_numeric($value))
				throw new \InvalidArgumentException("retention_amount parameter in Epoch's Customer Search API needs to be a number, '". $value . "'' given.");

		}


		if($value < 0)
			throw new \InvalidArgumentException("retention_amount parameter in Epoch's Customer Search API needs cant be less than zero, ". $value . " given.");

		if($value > 9999)
			throw new \InvalidArgumentException("retention_amount parameter in Epoch's Customer Search API needs cant be larger than 4 digits number, ". $value . " given.");

		return $value;
	}

}