<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

class NextBillDate implements ApiParameterInterface {

	private $value;

	public function __construct($value){
		$this->setValue($value);
	}

	public function getName(){
		return 'nextbilldate';
	}

	public function getValue(){ return $this->value;}

	public function setValue($value){
		$this->value = $this->validate($value);		
	}

	public function validate($value){

		if($value != null || $value<=0){

			if(!$this->checkmydate($value))
				throw new \InvalidArgumentException("nextbilldate parameter in Epoch's Customer Search API needs to be a valid date, ". $value . " given.");

		}


		return $value;
	}

	private function checkmydate($date) {
	  $tempDate = explode('-', $date);
	  // checkdate(month, day, year)
	  return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
	}

}