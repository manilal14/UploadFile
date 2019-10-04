<?php
header('Content-Type: application/json');

$uploaded = [];
$succeeded = [];
$failed = [];

if (!empty($_FILES['file'])) {
	foreach ($_FILES['file']['name'] as $key => $name) {
		if ($_FILES['file']['error'][$key]===0) {
			$temp = $_FILES['file']['tmp_name'][$key];

			$file = $_FILES['file']['name'][$key];

			if (move_uploaded_file($temp, "../uploads/{$file}") === true) {
				$succeeded[] = array(
					'name' => $name,
					'file' => $file
				);
			} else {
				$failed[] = array(
					'name' => $name
				);
			}
		}
	}

	if (!empty($_POST['ajax'])) {
		echo json_encode(array(
			'succeeded' => $succeeded,
			'failed' => $failed
		));
	}

}