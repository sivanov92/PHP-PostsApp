<?php
    require 'news.php';

 if(isset($_POST['title']))
  {
   $news = new News();
   $news->title = $_POST['title'];
   $news->description = $_POST['description'];
   $news->AddNews();
   header("Location: http://localhost/NewsBlogPHP/index.php");  
}