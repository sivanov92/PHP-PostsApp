<?php
    require "vendor/autoload.php";
    require 'news.php';
    use Rain\Tpl;

    $config = array(
        "tpl_dir"       => "templates",
        "cache_dir"     => "vendor/rain/raintpl/cache/"
);
Tpl::configure( $config );
 //
 
$t = new Tpl;
// Get DB data
//$news = new News();
//$info = $news->GetNews();
$id = $_GET['id'];
$t->assign('id',$id);
$t->draw('update');