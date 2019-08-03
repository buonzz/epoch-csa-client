<?php 
namespace Buonzz\Epoch\CustomerSearch\Actions;

class Retain implements ActionInterface {

	private $name = 'retain';

	public function getName(){
		return $this->name;
	}

	public function validate_params($parameters){

		// any one of these parameter will do, but need at least one
		$required_class_names = [
			'Buonzz\Epoch\CustomerSearch\Parameters\Memberid',
			'Buonzz\Epoch\CustomerSearch\Parameters\CreditCancelReason',
			'Buonzz\Epoch\CustomerSearch\Parameters\RetentionAmount'
		];

		$class_names = [];
		foreach($parameters as $item){
				$class_names[] = get_class($item);
		}

		$present_params = array_intersect($class_names, $required_class_names); 
		if(count($parameters)<3 || count($present_params) < 3 )
			throw new \InvalidArgumentException("Epoch's Search API requires member_id, retention_amount and cancel_reason parameter for retain action");
	} // 
}