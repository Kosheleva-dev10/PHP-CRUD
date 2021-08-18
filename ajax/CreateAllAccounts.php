<?php
    require("lib.php");

	$object = new CRUD();

    

if ($handle = opendir('../uploads/files/')) {
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != ".." && substr($entry,-3)=="pdf") {


            $i = (strlen($entry)-4);
            $filename = substr($entry,0,$i);
            if(!$object->VerifyStaffFiles($filename))
            {
            	$object->CreateNewAccount($filename);
          	}
        }
    }

    closedir($handle);
}
?>