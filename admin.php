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
$info = array();
 array_push($info,array('id'=>1,'title'=>'NewHome','description'=>'DESC'));
$t->assign('news',$info);
$t->draw('admin');