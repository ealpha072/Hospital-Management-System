<?php 
	require '../public/header.php'; 
	require_once "../config/classes.php";


echo '<div class="row h-100 justify-content-center align-items-center">
	<div class="col-10 col-md-8 col-lg-4">
	  	<h3 class="text-center">Login</h3>
		<form action="../config/formsprocess.php" method="post">
			<div class="card-body">';
			if(isset($_SESSION['msg']) && count($_SESSION['msg']) > 0){
				if($_SESSION['msg'][1] === 'Success'){

					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<p>'.$_SESSION['msg'][0].'</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
					sleep(5);
					header('Location: dashboard.php');
				}

				if($_SESSION['msg'][1] === 'Error'){
					echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<p>'.$_SESSION['msg'][0].'</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
				}
				//sleep(5);
				//unset($_SESSION['msg']);
			}

				echo '<div class="form-group input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
				</div>
					<input type="text" class="form-control" placeholder="Enter username" name="username" required value="Alpha">
				</div>

				<div class="form-group input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
				</div>
					<!--<label for="password">Password</label>-->
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" required value="Alpha">
				</div>

				<div class="row">
					<div class="col">
						<button type="submit" class="btn btn-success" name="login" id="loginbtn"><i class="fa fa-sign-in"></i> <span>Login</span>
					</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>';

?>

<?php require '../public/footer.php'; ?>