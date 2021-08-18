<?php

require './lib.php';

$object = new CRUD();



$announcement = $object->GetCurrentAnnouncement();

if (count($announcement) > 0) {
    $number = 1;
    foreach ($announcement as $announcement) {


	$data .= "<div class='jumbotron'>
	  <h2 class='display-1'>".$announcement['ann_title']."</h2>
	  <p class='lead'> Valid Till: ".$announcement['valid_to_date']."</p>
	  <hr class='my-4'>
	  <p>".$announcement['ann_content']."</p>
	</div>";


        $number++;
    }
} else {
    // records not found
    $data .= '';
}



echo $data;

?>