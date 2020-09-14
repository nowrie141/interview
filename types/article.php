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
        $this->content = strip_tags($content); //Remove all tags in the text
        $this->tags = $tags;
        $this->image = $image;
        $this->category = $category;


        // Add span to content for readMore function
        $readmore = "<span id='dots-$this->id'>...</span><span id='more-$this->id'>";
        $this->content = substr_replace(
            $this->content,
            $readmore,
            55, // Insert at character 55
            0
        );
    }

    public function echo_template()
    {
        $html = "
        <div class='article'>
        <div class='article-header'>
        <a href='$this->url' >
            <h4 class='title'>$this->title</h4>
           <img src='$this->image'
           height='120px' width='100%' alt=''>
        </a>
        </div>
        <div class='content'>$this->content</div>
        <button onclick='readMore(this.id)' id='button-$this->id' data-id='$this->id'>Read more</button>
        </div>";

        echo $html;
    }

    public function __destruct()
    {
    }
}
