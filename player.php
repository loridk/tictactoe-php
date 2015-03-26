<?php
/**
 * Created by PhpStorm.
 * User: Lori DK & Meagan Park
 * Date: 3/3/2015
 * Time: 5:35 PM
 */

class player {
    public $name;
    public $piece;

    function __construct($name, $piece) {
        $this->name = $name;
        $this->piece = $piece;
    }



    function __toString() {
        return $this->name . " - " . $this->piece;
    }
}