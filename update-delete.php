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
$page; 

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$news = new News();
$info = $news->GetNews($page,5);
$routesUpdate= [];
$routesDelete= [];

foreach($info as $x=>$element){
 array_push($routesUpdate,"/NewsBlogPHP/update.php/?id=".$element['id']);
 array_push($routesDelete,"/NewsBlogPHP/delete.php/?id=".$element['id']);
}
function SetRoutes($key){
 echo '<a href='.$UpdateRoute[$key].' class="btn btn-primary col mr-1">Update</a>';
 echo '<a href='.$DeleteRoute[$key].' class="btn btn-primary col mr-1">Delete</a>';
}

//$info = array();
// array_push($info,array('id'=>1,'title'=>'NewHome','description'=>'DESC'));
$t->assign('news',$info);
//$t->assign('UpdateRoute',$routesUpdate);
//$t->assign('DeleteRoute',$routesDelete);
$t->assign('SetRoutes',SetRoutes());
$t->draw('update-delete');