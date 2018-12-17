<?php

namespace AppBundle\services\Bus;

class ErrorJson{

    private $is_ok = false;
    private $error_message = "";

    public function getIsOk(){
        return $this->is_ok;
    }
    public function getErrorMessage(){
        return $this->error_message;
    }

    public function setIsOk( $is_ok ){
        $this->is_ok = $is_ok;
    }
    public function setErrorMessage( $error_message ){
        $this->error_message = $error_message;
    }
}