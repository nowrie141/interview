<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" media="screen and (min-device-width: 480px)" href="./styles/480.css" />
  <link rel="stylesheet" media="screen and (min-device-width: 768px)" href="./styles/768.css" />
  <link rel="stylesheet" media="screen and (min-device-width: 1200px)" href="./styles/1200.css" />
</head>

<body>
  <?php
  include('./types/article.php');
  include('./types/event.php');
  include('./types/user.php');
  function getArticles($data)
  {
    foreach ($data as $object) {
      $article = new Article(
        $object['id'],
        $object['title'],
        $object['url'],
        $object['date'],
        $object['author'],
        $object['content'],
        $object['tags'],
        $object['image'],
        $object['category']
      );
      $article->echo_template();
    }
  }

  function getEvents($data)
  {
    foreach ($data as $object) {
      $event = new Event(
        $object['id'],
        $object['title'],
        $object['location'],
        $object['date'],
        $object['time'],
        $object['url'],
        $object['geo'],
        $object['tags']
      );
      $event->echo_template();
    }
  }

  function getUser($data)
  {
    $user_display = new User(
      $data['name'],
      $data['interests'],
      $data['geo']
    );
    $user_display->echo_template();
  }

  $articles = json_decode(file_get_contents("./data/articles.json"), TRUE);
  $events = json_decode(file_get_contents("./data/events.json"), TRUE);
  $user = json_decode(file_get_contents("./data/user.json"), TRUE);
  ?>
  <div class="header">
    <div class="content">
      <img class="logo" src="./images/image.png" width="50px" height="50px">
      <?php
      getUser($user);
      ?>
    </div>
  </div>
  <div class="wrapper">
    <div class="articles">
      <h2 class="title">Articles</h2>
      <div class="list">
        <?php
        getArticles($articles);
        ?>
      </div>
    </div>
    <div class="events">
      <h2 class="title">Events</h2>
      <div class="list">
        <?php
        getEvents($events);
        ?>
      </div>
    </div>
  </div>

</body>

</html>