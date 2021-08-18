<?php

require('UploadHandler.php');
$upload_dir = './uploads/';
$upload_handler = new UploadHandler(array(
                        'max_file_size' => 1048576, //1MB file size
                        'image_file_types' => '/\.(gif|jpe?g|png|mp4|mp3|pdf)$/i',
                        'upload_dir' => $upload_dir,
                        'upload_url' => 'http://localhost:8888/medfund/uploads/',
                        'thumbnail' => array('max_width' => 80,'max_height' => 80)
                        ));
    
/* 
 * End of script
 */
?>