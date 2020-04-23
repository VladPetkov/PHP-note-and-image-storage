<!--- Navigation -->
	<nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img src=""></a> <button class="navbar-toggler" data-target="#navbarResponsive" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<!-- <a class="nav-link active" href="index.php">Home</a> -->
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="team.php">Team</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact-us.php">Contact Us</a>
					</li> -->
					<?php if(!isset($_SESSION['userId'])){
						echo '<li class="nav-item">
								<a class="nav-link" href="login.php">Login</a>
								</li>'; }

							 else{ echo'<li class="nav-item">
							<a class="nav-link" href="includes/logout.inc.php">Logout</a>
							</li>' ;  }; ?>	


						 

				</ul>
			</div>
		</div>
	</nav>
	<!--- End Navigation -->
