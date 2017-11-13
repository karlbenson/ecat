<?php
	$connect=mysqli_connect("localhost","root","root","lukeddb");

	if (isset($_POST["id"])) {
		foreach ($_POST["id"] as $id) {
			$sql="DELETE from DOCTOR where DOC_LICENSE_NUM='".$id."'";
			mysqli->query($connect, $sql);
		}
	}
?>