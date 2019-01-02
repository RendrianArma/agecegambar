<?php
// prevent browser
if(PHP_SAPI !== 'cli'){ die; }

require 'vendor/autoload.php';
require 'helpers.php';

use Buchin\GoogleSuggest\GoogleSuggest;
use Buchin\GoogleImageGrabber\GoogleImageGrabber;
use Buchin\Badwords\Badwords;

if(!isset($argv[1])){
	echo "Please specify keyword: php import.php \"keyword1,keyword2,keyword3\"\n";
	die;
}


// echo "=> Gathering initial keywords\n";

$keywords = explode(',', $argv[1]);
$lang = isset($argv[2]) ? $argv[2] : '';
$country = isset($argv[3]) ? $argv[3] : '';
$max = isset($argv[4]) ? $argv[4] : PHP_INT_MAX;
$source = 'i';
$tot = 0 ;

$namafile = str_replace(' ', '-', $keywords[0]);
// $file = fopen('keywords/'.$namafile.'.txt', 'w+');
foreach ($keywords as $key => $keyword) {
	if(Badwords::isDirty($keyword)){
		unset($keywords[$key]);
	}

	foreach (range('a', 'z') as $char) {
		$init = (array)@GoogleSuggest::grab($keyword . ' ' . $char, $lang, $country, $source);
		foreach ($init as $kw) {
			if(!Badwords::isDirty($kw)){
				$tot++;
				echo  $kw ."\n";
				$keywords[] = $kw;
			}
		}

		$keywords = array_unique($keywords);

		//echo "============= SLEEP =============\n";
	}
	
	
	// foreach ($keywords as $xkw)
	// {
	// 	fwrite($file, $xkw . "\n");
		
	// }
	

	sleep(rand(1,5));
}
// fclose($file);




// do {
// 	try {
// 		if($count > $max){
// 			echo "Import finished. Congratulations!\n";
// 			die;
// 		}

// 		$keyword = array_shift($keywords);


// 		echo '==> scraping #' . $count . ': ' . str_slug($keyword) . "...\n";

// 		$data = [
// 			'related' => [],
// 			'images' => [],
// 			'sentences' => [],
// 		];

// 		$sentences = (array)@get_sentences($keyword);

// 		$data['sentences'] = $sentences;

// 		$related = (array)@GoogleSuggest::grab($keyword, $lang, $country, $source);

// 		if(!empty($related)){
// 			$new_keywords = [];

// 			foreach ($related  as $r) {
// 				if(!data_exists($r) && $r !== $keyword){
// 					$new_keywords[] = $r;
// 				}
// 			}

// 			$keywords = array_merge($keywords, $new_keywords);

// 			$data['related'] = $related;
// 		}

// 	} catch (\Exception $e) {
// 		echo '===>' . $e->getMessage() . "\n";
// 		sleep(rand(5, 60));
// 	}

// 	sleep(1);
// 	$count++;

// } while (!empty($keywords));