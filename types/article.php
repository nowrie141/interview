<?php
class Article
{

    private $id;
    private $title;
    private $url;
    private $date;
    private $author;
    private $content;
    private $tags;
    private $image;
    private $category;

    public function __construct($id, $title, $url, $date, $author, $content, $tags, $image, $category)
    {
        $this->id = $id;
        $this->title = $title;
        $this->url = $url;
        $this->date = $date;
        $this->author = $author;
        $this->content = $content;
        $this->tags = $tags;
        $this->image = $image;
        $this->category = $category;
    }

    public function echo_template(){
        $html = "
        <div class='article'>
        <a href='$this->url' >
            <h4 class='title'>$this->title</h4>
           <img src='$this->image'
           height='120px' width='100%' alt=''>
           <div class='content'>$this->content</div>
        </a>
        </div>";

        echo $html;
    }

    public function __destruct() {
    }
}
?>