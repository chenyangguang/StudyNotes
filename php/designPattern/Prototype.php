<?php

/*
 * prototype pattern
 */

interface Prototype {
    function copy();
}

class Cars implements Prototype {
    public $name;
    public $color;
    public $price;

    public function __construct($name, $color, $price)
    {
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
    }

    public function showCarsDetails()
    {
        printf("The %s is a %s one, it needs $%s.", $this->name, $this->color, $this->price);
    }

    public function copy() {
        return clone $this;
    }
}

$tesla = new Cars('Tesla', 'White', '300000');
$tesla->showCarsDetails();

$bugatti = $tesla->copy();
$bugatti->name = 'Bugatti';
$bugatti->price = '2500';
$bugatti->color = 'Blue';
$bugatti->showCarsDetails();

// The Tesla is a White one, it needs $300000.The Bugatti is a Blue one, it needs $2500.

