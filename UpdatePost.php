<?php
    require 'news.php';
   $id= $_GET['id'];
   $news = new News();
   $news->title = $_POST['title'];
   $news->description = $_POST['description'];
   $news->UpdateNews($id);
   header("Location: http://localhost/NewsBlogPHP/index.php");  
