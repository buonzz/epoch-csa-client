<?php 

namespace Buonzz\Epoch\CustomerSearch\Actions;

use Buonzz\Epoch\CustomerSearch\Parameters\CreditCancelReason;

/**
* Credit a particular transaction(s). 
* Requires the following to be present (trans_id and credit_reason).
*/
class Credit implements ActionInterface {

	private $name = 'credit';

	public function getName(){
		return $this->name;
	}

	public function validate_params($parameters){

		// any one of these parameter will do, but need at least one
		$required_class_names = [
			'Buonzz\Epoch\CustomerSearch\Parameters\Transactionid',
			'Buonzz\Epoch\CustomerSearch\Parameters\CreditCancelReason',
		];

		$class_names = [];

		foreach($parameters as $item){
				$class_names[] = get_class($item);
		}

		$present_params = array_intersect($class_names, $required_class_names); 

		if(count($parameters)<=1 || count($present_params) <= 1 )
			throw new \InvalidArgumentException("Epoch's Search API requires trans_id and credit_reason parameter for credit action");

	} // 
}