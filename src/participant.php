<?php
include ('solve.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- link rel="stylesheet" href="stylesheets/main.css" -->
        <link rel="stylesheet" href="../config/main.css">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Add color to the main menu, change dimensions of it to whatever, etc-->
        <div class="main-menu">
            <div class = "menu-header"><center>
                <!-- Header ICON? BIg letter here(first letter of username)-->
                <div class="profile-icon">
                        <?php echo $user_check[0];?>
                </div>

                <div class="username"><?php echo $user_check;?></div>
            </div></center>

            <!-- Navbar - later should dynamically load options, but for now are hard coded-->
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav navbar-center">
                    <?php
                        if($roles_values['isparticipant'] != 0){
                                echo '<li class="nav-item right-side-padding"><a href="participant.php">Participant</a></li>';
                        }
                        if($roles_values['isorganizer'] != 0){
                                echo '<li class="nav-item right-side-padding"><a href="challenges.php">Organizer</a></li>';
                        }
                        if($roles_values['isadmin'] != 0){
                                echo '<li class="nav-item right-side-padding"><a href="admin.php">Administrator</a></li>';
                        }
                     ?>
                    <li class="nav-item right-side-padding"><a href="logout.php">Log Off</a></li>
                </ul>
            </nav>
        </div>

        <!--Put main content in pages here-->
        <div class="main-content" align="center">
		<h1>Challenges</h1>
                                <table>
                                        <tr>
                                                <th>Organizer &nbsp;</th>
                                                <th>Problem &nbsp;</th>
                                        </tr>
                                        <?php
                                                $result = mysqli_query($db, "select challengeid, problem from challenge;");
                                                while($row = mysqli_fetch_array($result)){
                                                        $organizer_query = mysqli_query($db,"select username from organizerchallenge where challengeid=".$row['challengeid'].";");
                                                        $organizer_result = mysqli_fetch_array($organizer_query);
                                                        echo "<tr><td>".$organizer_result['username']."</td>";
                                                        echo "<td>".$row['problem']."</td>";
							echo "<td><form action='participant.php' method='POST'><input type='text' placeholder='Solution' 
								name='solution'><input type='submit' value='Submit' name='submit'><input type='hidden'
								value = '".$row['challengeid']."' name='challengeID'></form></td>";
							echo "</tr>";
			                                            
}
		
             			?>
                 </table>
        </div>
		<br><br>
	<?php echo "<h4>The problem you submitted was $solved </h4>"; ?>

        <!-- Footer - change css when possible-->
        <footer class="page-footer font-small footer-main">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3"> 2019 Copyright:
                Adelphi University
            </div>
        </footer>
    </body>
</html>
