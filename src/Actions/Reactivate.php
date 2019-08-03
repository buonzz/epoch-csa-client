<?php 

namespace Buonzz\Epoch\CustomerSearch\Actions;

class Reactivate implements ActionInterface {
	private $name = 'reactivate';
	public function getName(){
		return $this->name;
	}
	public function validate_params($parameters){
		// any one of these parameter will do, but need at least one
		$required_class_names = [
			'Buonzz\Epoch\CustomerSearch\Parameters\Memberid'
		];
		$class_names = [];
		foreach($parameters as $item){
				$class_names[] = get_class($item);
		}
		$present_params = array_intersect($class_names, $required_class_names); 
		if(count($parameters)<1 || count($present_params) < 1 )
			throw new \InvalidArgumentException("Epoch's Search API requires member_id parameter for reactivate action");
	} // 
}