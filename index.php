<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Articles & Events</title>
  <link rel="stylesheet" media="screen and (min-device-width: 480px)" href="css/480.css" />
  <link rel="stylesheet" media="screen and (min-device-width: 768px)" href="css/768.css" />
  <link rel="stylesheet" media="screen and (min-device-width: 1200px)" href="css/1200.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
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
      <img class="logo" src="images/image.png" width="50px" height="50px">
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
  <div class="read-article"></div>
  <div id="map"></div>
  <script>
    var map = L.map('map', {
      center: [54.183, -3.844],
      minZoom: 2,
      zoom: 4.5
    })

    // load a tile layer
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const markers = JSON.parse('<?php echo json_encode($events) ?>')
    Object.keys(markers).map(key => {
      const coordinates = markers[key]['geo'];
      L.marker([coordinates['lat'], coordinates['lng']]).bindPopup(`
        <b> ${markers[key]['title']} </b>
        <p> ${markers[key]['date']} </p>
        <a href=${markers[key]['url']}>Go to site</a>
      `)
        .addTo(map);
    });
  </script>
  <script src="js/script.js"></script>
</body>

</html>