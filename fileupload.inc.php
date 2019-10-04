<?php
		
		$total=count($_FILES['file']['name']);
		for ($i=0; $i < $total; $i++) { 
			$target_dir="uploads/";
			$target_file=$target_dir.$_FILES['file']['name'][$i];
			if ($_FILES['file']['error'][$i]>0) {
				echo "Error: ".$_FILES['file']['error'][$i]."<br><hr>";
			}
			elseif (file_exists($target_file)) {
				echo "File already exists!<br>";
				echo "Location: ".$target_file."<br><hr>";
			}
			else {
				if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_file)) {
					echo "Name: ".$_FILES['file']['name'][$i]."<br>";
					echo "Type: ".$_FILES['file']['type'][$i]."<br>";
					echo "Size: ".($_FILES['file']['size'][$i]/1024)." kB<br>";
					echo "Location: ".$target_file."<br><hr>";
				}
			}
		}

		?>