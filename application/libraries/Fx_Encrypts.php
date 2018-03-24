<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fx_Encrypts
{
    public function __construct()
    {
        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));
    }

    public function Battlenet($email, $password)
    {
        return strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($email)).":".strtoupper($password))))))));
    }

    public function Account($username, $password)
    {
        if (!is_string($username))
            $username = "";

        if (!is_string($password))
            $password = "";

        $sha_pass_hash = sha1(strtoupper($username).':'.strtoupper($password));

        return strtoupper($sha_pass_hash);
    }

}

?>