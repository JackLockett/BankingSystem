<?php require("NavBar.php");?>

	<div class="container bgColor">
        	<main role="main" class="pb-3">

				<h1>Welcome to <span style = "color: #BA0046">Hallam Bank</h1>

				<br><br>

				<?php 
					date_default_timezone_set('Europe/London');

					$hour = date('G');
					$timeOfDay = "";

					if ( $hour >= 5 && $hour <= 11 ) {
						$timeOfDay .= "Good Morning";
					} else if ( $hour >= 12 && $hour <= 18 ) {
						$timeOfDay .= "Good Afternoon";
					} else if ( $hour >= 19 || $hour <= 4 ) {
						$timeOfDay .= "Good Evening";
					}
				?>

				<h2><?php echo $timeOfDay?>, what would you like to do today?</h2>
				<br><br>
				<h2 style="font-size: 23px;"><a href="./Customer/CustomerRegister.php">Register For Product Interest</h2>
				<br><br>
				<h2 style="font-size: 23px;"><a href="./Customer/CustomerLogin.php">Login To Customer Account</h2>
				<br><br>
				<h2 style="font-size: 23px;"><a href="./Admin/AdminLogin.php">Login To Admin Account</a></h2>
			</main>
	</div>

<?php require("Footer.php");?>


