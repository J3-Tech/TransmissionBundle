<?php

namespace Transmission\Bundle\TransmissionBundle\Service;

use Transmission\Transmission;

class TransmissionService
{

	protected $transmission;

	public function __construct($host,$port)
	{
		$this->transmission=new Transmission($host,$port);
	}

	public function __call($method,$args){
		if(method_exists($this->transmission,$method)){
			return $this->transmission->$method($args);
		}
	}
}