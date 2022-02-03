<?php

require_once 'db_connect.php';

//if form is submitted
if($_POST) {

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$name = $_POST['editName'];
	$address = $_POST['editAddress'];
	$contact = $_POST['editContact'];
	$active = $_POST['editActive'];
    

    $sql = "UPDATE dhaka_resturent SET name = '$name', location = '$address', WHERE id = $id";
    $res = $db->query($sql);
    
	$sql = "UPDATE members SET name = '$name', contact = '$contact', address = '$address', active = '$active' WHERE id = $id";
    $query = $connect->query($sql);
    
	if($res === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";
	} else {
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();
    $db->close();

	echo json_encode($validator);

}