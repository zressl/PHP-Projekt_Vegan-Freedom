<?php
session_start();
include ("process.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/welcome_cms.css">
    <title>Vegan Freedom</title>
</head>
<body>
<header>
  <div class="top"></div>
  <div class="h1">
    <h1>Vegan Freedom</h1>
  </div>
  <div class="logprof">
    <a href="../index.php">Logout</a>
    <a href="">Profil</a>
  </div>
</header>
<p><?php echo $info; ?></p>
<aside id="cmsnav">
  <nav class="nav">
    <ul>
      <li><a href="">Beitrag erstellen</a></li>
      <li><a href="">Blog einträge</a></li>
      <li><a href="">Events</a></li>
      <li><a href="">User Anfragen</a></li>
    </ul>
</nav>
</aside>
<main>
  <form action="" method="POST">
    <div class="titel">
      <label for="title"></label>
      <input type="text" name="Article_title" class="Article_title" placeholder="Beitrag Titel">
    </div>
    <textarea name="Article_content" id="Article_editor" cols="30" rows="10"></textarea>
    <input type="submit" name="submit_data" value="Beitrag Erstellen" class="publish_btn">
   
  </form>
	
</main>
<footer> 
</footer>
<div class="bottom"></div>
<script src="../ckeditor_4/ckeditor.js"></script>
<script>
  CKEDITOR.replace('Article_editor');
</script>
</body>
</html>