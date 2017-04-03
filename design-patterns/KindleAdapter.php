<?php
namespace Acme;

class KindleAdapter implements BookInterface {
    private $kindle;
    
    public function __construct(Kindle $kindle) {
        $this->kindle = $kindle;
    }

    public function open(){
        $this->kindle->turnOn();
    }

    public function turnPage(){
        $this->kindle->pressNextButton();
    }

}