<?php 

namespace Buonzz\Epoch\CustomerSearch\Parameters;

interface ApiParameterInterface {

	public function getName();

	public function getValue();
	public function setValue($value);

	public function validate($value);

}