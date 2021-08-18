<?php

require './lib.php';

$object = new CRUD();


// Design initial table header
$data = '<table class="table table-bordered mb-4">
						<thead>
							<tr>
							<th>No.</th>
							<th>Staff ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email Address</th>
							<th>Mobile Number</th>
							<th>Status</th>
							<th>Action</th>
							</tr>
						</thead>';


$staff = $object->GetAllStaff();
$data .= '<tbody>';
if (count($staff) > 0) {
    $number = 1;
    foreach ($staff as $staff) {
        $data .= '
					<tr>
						<td>' . $number . '</td>
						<td>' . $staff['staff_id'] . '</td>
						<td>' . $staff['first_name'] . '</td>
						<td>' . $staff['last_name'] . '</td>
						<td>' . $staff['email_address'] . '</td>
						<td>' . $staff['mobile_number'] . '</td>
						<td>' . $object->get_staff_status($staff['is_active']). '</td>

						<td>
							<i onclick="GetStaffDetails(' . $staff['id'] . ')" class="fa fa-wrench"></i> <i onclick="DeleteStaff(' . $staff['id'] . ')" class="fa fa-trash"></i>
						</td>
    				</tr>';
        $number++;
    }
} else {
    // records not found
    $data .= '<tr><td colspan="6" class="row">Records not found!</td></tr>';
}

$data .= '</tbody>';

$data .= '</table>';

echo $data;

?>