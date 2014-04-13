<?php

namespace Transmission\Bundle\TransmissionBundle\Service;

use Transmission\Transmission;
use Transmission\Client;

class TransmissionService
{

    protected $transmission;

    public function __construct($host,$port,$username=null,$password=null)
    {
        $this->transmission=new Transmission($host,$port);
        if ($username && $password) {
            $client = new Client();
            $client->authenticate($username,$password);
            $this->transmission->setClient($client);
        }
    }

    public function __call($method,$args)
    {
        if (method_exists($this->transmission,$method)) {

            return call_user_func_array(array($this->transmission,$method),$args);
        }
    }
}
