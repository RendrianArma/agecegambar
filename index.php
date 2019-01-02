<?php
require 'vendor/autoload.php';
require 'helpers.php';

Flight::route('/', function(){
	if(isset($_GET['nerd'])){
		echo home_url() . random_post();
		die;
	}

	view('home');
});

Flight::route('/sitemap_index.xml', function(){
	header('Content-Type: application/xml; charset=utf-8');
	$arraydata = array();
	if ($handle = opendir('data/')) {

		while (false !== ($entry = readdir($handle))) {

			if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && $entry != ".gitignore") {

				array_push($arraydata, str_replace('.srz.php', '.html', $entry));
			}
		}

		closedir($handle);
	}
	$totaldata = count($arraydata);
	$result['data'] =  $arraydata;
	$result['totalsitemap'] =  ceil($totalsitemap = $totaldata / 1000);

	view('sitemapindex', ['data' => $result]);
	
});
Flight::route('/robots.txt', function(){
header("Content-Type: text/plain");
	$arraydata = array();
	if ($handle = opendir('data/')) {

		while (false !== ($entry = readdir($handle))) {

			if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && $entry != ".gitignore") {

				array_push($arraydata, str_replace('.srz.php', '.html', $entry));
			}
		}

		closedir($handle);
	}
	$totaldata = count($arraydata);
	$result['data'] =  $arraydata;
	$result['totalsitemap'] =  ceil($totalsitemap = $totaldata / 1000);

	echo "User-agent: *\n\n";


	for ($i=1; $i <= $result['totalsitemap'] ; $i++) { 
		echo "Sitemap: https://".$_SERVER['SERVER_NAME']."/post-sitemap1.xml\n";
	}
});


Flight::route('/sitemap-post@id.xml', function($id){
	header('Content-Type: application/xml; charset=utf-8');
	$arraydata = array();
	if ($handle = opendir('data/')) {

		while (false !== ($entry = readdir($handle))) {

			if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && $entry != ".gitignore") {

				array_push($arraydata, str_replace('.srz.php', '.html', $entry));
			}
		}

		closedir($handle);
	}
	$totaldata = count($arraydata);
	$result['data'] =  $arraydata;
	$result['totalsitemap'] =  ceil($totalsitemap = $totaldata / 1000);

	$awal =  $id;
	if($awal !== "1")
	{
		$awal =  $id + 999;
	}
	$akhir = $awal + 999;
	if($akhir > $totaldata)
	{
		$akhir = $totaldata;
	}


	echo '<?xml version="1.0" encoding="UTF-8"?>'; 
	echo '<?xml-stylesheet type="text/xsl" href="//'.$_SERVER['SERVER_NAME'].'/sitemap-theme.xsl"?>';
	echo '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	for ($i=$awal; $i < $akhir ; $i++) { 
		echo '<url>';
		echo '	<loc>https://'.$_SERVER['SERVER_NAME'].'/'.$arraydata[$i].'.html</loc>';
		echo '	<lastmod>'.date('c').'</lastmod>';
		echo '</url>';
		
	}
	echo '</urlset>';



});





Flight::route('/pages/@page', function($page){
	view('pages.page', ['page' => $page]);
});

Flight::route('/@slug.jpg', function($slug){
	$data = get_data($slug);

	return Flight::redirect(collect($data['images'])->random()['url']);
});

Flight::route('/@slug.html', function($slug){
	$data = get_data($slug);

	if($data === false){
		return Flight::redirect(random_post());
	}

	$data['keyword'] = str_replace('-', ' ', $slug);

	view('image', $data);
});

Flight::start();