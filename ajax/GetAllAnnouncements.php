<?php

require './lib.php';

$object = new CRUD();


// Design initial table header
$data = '<table class="table table-bordered mb-4">
					<thead>
						<tr>
							<th>No.</th>
							<th>Date Created</th>
							<th>Valid From</th>
							<th>Valid To</th>
							<th>Title</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>';


$announcement = $object->GetAllAnnouncements();
$data .= '<tbody>';
if (count($announcement) > 0) {
    $number = 1;
    foreach ($announcement as $announcement) {
        $data .= '<tr>
				<td>' . $number . '</td>
				<td>' . $announcement['date_created'] . '</td>
				<td>' . $announcement['valid_from_date'] . '</td>
				<td>' . $announcement['valid_to_date'] . '</td>
				<td>' . $announcement['ann_title'] . '</td>
				<td>' . $object->get_announcement_status($announcement['ann_status']) . '</td>

				<td>
					<i onclick="GetAnnouncementDetails(' . $announcement['id'] . ')" class="fa fa-wrench"></i> <i onclick="DeleteAnnouncement(' . $announcement['id'] . ')" class="fa fa-trash"></i>
				</td>
    		</tr>';
        $number++;
    }
	$data .= '</tbody>';
} else {
    // records not found
    $data .= '<tbody><tr><td colspan="6">Records not found!</td></tr></tbody>';
}



$data .= '</table>';

echo $data;

?>