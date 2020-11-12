<?php
    require 'news.php';
   $id= $_GET['id'];
   $news = new News();
   $news->DeleteNews($id);
   header("Location: http://localhost/NewsBlogPHP/index.php");  
