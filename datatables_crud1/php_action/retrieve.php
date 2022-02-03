<?php

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM members";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';
	if($row['active'] == 1) {
		$active = '<span>Fast Food</span>';
	}
	 else if($row['active'] == 2) {
		$active = '<span>American</span>';
	} else if ($row['active'] == 3) {
		$active = '<span>Indian</span>';
	}
	else if($row['active'] == 4) {
		$active = '<span>Dessert</span>';
	} else if ($row['active'] == 5) {
		$active = '<span>Deshi Food</span>';
	}

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['id'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['id'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$x,
		$row['name'],
		$row['address'],
		$row['contact'],
		$active,
		$actionButton
	);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);