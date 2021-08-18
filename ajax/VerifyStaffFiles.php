 <?php

 require './lib.php';

 $object = new CRUD();
 $data = "";
//$dir    = '/uploads/files/';

 $data = '<table class="table table-bordered mb-4">
 					<thead>
						<tr>
							<th>No.</th>
							<th>Staff ID</th>
							<th>Action</th>
						</tr>
					</thead>';
if ($handle = opendir('../uploads/files/')) {
$data .= '<tbody>';
	$number = 1;
    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != ".." && substr($entry,-3)=="pdf") {


            $i = (strlen($entry)-4);
            $filename = substr($entry,0,$i);
            if(!$object->VerifyStaffFiles($filename))
            {
            	$data .= '<tr>
								<td>' . $number . '</td>
								<td>' . $filename . '</td>

								<td>
									<button onclick="CreateAccount(\'' . $filename . '\')" class="btn btn-outline-danger mb-2">Create Account</button> 
								</td>
							</tr>';
        		$number++;
            	//$data .= $filename."<br>";
          	}
        }
    }
	$data .= '</tbody>';

    closedir($handle);
}
$data .= '</table>';
echo $data
?>