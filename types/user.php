<?php
class User
{

    private $name;
    private $interests;
    private $geo;


    public function __construct($name, $interests, $geo)
    {
        $this->name = $name;
        $this->interests = $interests;
        $this->geo = $geo;
    }

    public function echo_template(){
        $html = "<p class='user-info'>Hi $this->name</p>";
        echo $html;
    }

    public function __destruct() {
    }
}
