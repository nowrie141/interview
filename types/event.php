<?php
class Event
{

    private $id;
    private $title;
    private $location;
    private $date;
    private $time;
    private $url;
    private $geo;
    private $tags;

    public function __construct($id, $title, $location, $date, $time, $url, $geo, $tags)
    {
        $this->id = $id;
        $this->title = $title;
        $this->location = $location;
        $this->date = $date;
        $this->time = $time;
        $this->url = $url;
        $this->geo = $geo;
        $this->tags = $tags;
    }

    public function echo_template(){
        $html = "
        <div class='event' id='id='event-$this->id''>
        <a href='$this->url' >
           <h4 class='title'>$this->title</h4>
           <ol>
            <li class='event-location'><span>Location: </span>$this->location</li>
            <li class='event-location'><span>Date: </span>$this->date</li>
           </ol>
        </a>
        </div>";

        echo $html;
    }

    public function __destruct() {
    }
}
