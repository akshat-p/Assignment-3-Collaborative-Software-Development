<?php
   include("config.php");
   if($db->connect_errno)
        {
                echo "Connect Failed: ". $db->connect_error;
                exit();
        }


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
		print_r($_POST);
		if(isset($_POST['challengeID'])) {
			$rowID = intval($_POST['challengeID']);
			$query = "DELETE FROM Challenge WHERE challengeID=$rowID LIMIT 1;";
			$result= mysqli_query($db,$query);
			echo "Error: " . $query . "<br>" . $db->error;
			header('Location: challenges.php');
	}
}

?>