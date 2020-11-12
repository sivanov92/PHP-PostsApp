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
//$info = array();
// array_push($info,array('id'=>1,'title'=>'NewHome','description'=>'DESC'));
$t->assign('news',$info);

//Set info for the pagination
$page; 

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
//
$total_pages = $news->TotalPages($page,5);
//
$prevClass ; 
if($page <= 1)
{ $prevClass= 'disabled'; } 
$prevHref;
if($page <= 1){ $prevHref= '#'; } 
else { $prevHref= "?page=".($page - 1);}

$nextClass;
if($page >= $total_pages)
{ $nextClass= 'disabled'; }   

$nextHref;
if($page >= $total_pages){ $nextHref= '#'; } 
else { $nextHref=  '?page='.($page + 1); }

$lastHref = '?page='.$total_pages;

$t->assign('prevClass',$prevClass);
$t->assign('prevHref',$prevHref);
$t->assign('nextClass',$nextClass);
$t->assign('nextHref',$nextHref);
$t->assign('lastHref',$lastHref);

$t->draw('index');