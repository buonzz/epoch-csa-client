<?php 

namespace Buonzz\Epoch\CustomerSearch\Actions;

use Buonzz\Epoch\CustomerSearch\Parameters\CreditCancelReason;

class Extend implements ActionInterface {

	private $name = 'extend';

	public function getName(){
		return $this->name;
	}

	public function validate_params($parameters){

		// any one of these parameter will do, but need at least one
		$required_class_names = [
			'Buonzz\Epoch\CustomerSearch\Parameters\Memberid',
			'Buonzz\Epoch\CustomerSearch\Parameters\NextBillDate'
		];

		$class_names = [];

		foreach($parameters as $item){
				$class_names[] = get_class($item);
		}

		$present_params = array_intersect($class_names, $required_class_names); 

		if(count($parameters)<2 || count($present_params) < 2 )
			throw new \InvalidArgumentException("Epoch's Search API requires member_id and nextbilldate parameters for extend action");

	} // 
}