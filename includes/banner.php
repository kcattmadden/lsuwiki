<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>Welcome,  <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">Logout</a></span>
	</div>
<?php }else{ ?>
	<div class="banner">
		<div class="welcome_msg">
			<h1>LSU WIKI</h1>
			<p> 
			    Welcome to the LSU Wiki!<br> 
			    Where the tiger community comes <br>
				together to exchange knowledge.<br>
				
			</p>
			<a href="register.php" class="btn">Register Here</a>
		</div>

		<div class="login_div">
			<form action="<?php echo BASE_URL . 'index.php'; ?>" method="post" >
				<h2>Login</h2>
				<div style="width: 60%; margin: 0px auto;">
					<?php include(ROOT_PATH . '/includes/errors.php') ?>
				</div>
				<input style="background-color: #D0D0CE" type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				<input style="background-color: #D0D0CE" type="password" name="password"  placeholder="Password"> 
				<button class="btn" type="submit" name="login_btn">Sign in</button>
			</form>
		</div>
	</div>
<?php } ?>