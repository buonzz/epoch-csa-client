<?php 

namespace Buonzz\Epoch\CustomerSearch\Actions;

/**
* Search for a member. 
* At least one of the following have to be present (member_id, email,
* username, cardnum).
*/
class Search implements ActionInterface {

	private $name = 'search';

	public function getName(){
		return $this->name;
	}

	public function validate_params($parameters){

		// any one of these parameter will do, but need at least one
		$optional_class_names = [
			'Buonzz\Epoch\CustomerSearch\Parameters\Memberid', 
			'Buonzz\Epoch\CustomerSearch\Parameters\Email', 
			'Buonzz\Epoch\CustomerSearch\Parameters\Username', 
			'Buonzz\Epoch\CustomerSearch\Parameters\Cardnumber'];

		$class_names = [];

		foreach($parameters as $item){
			$class_names[] = get_class($item);
		}

		$present_params = array_intersect($class_names, $optional_class_names); 

		if(count($parameters)<=0 || count($present_params) <= 0 )
			throw new \InvalidArgumentException("Epoch's Search API requires any of the following: member_id, email, username, cardnum");

	} // 
}