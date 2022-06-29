<?php require 'header.php' ?>

<div class="wrapper">
	<!-- Sidebar  -->
	<nav id="sidebar">
		<div class="sidebar-header">
            <!--PROFILE IMAGE GOES HERE-->
			<h3>Admin</h3>
			<!--<strong>BS</strong>-->
		</div>

		<ul class="list-unstyled components">
			<li class="active">
				<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="fas fa-home"></i>
					Home
				</a>
				<ul class="collapse list-unstyled" id="homeSubmenu">
					<li>
						<a href="#">Home 1</a>
					</li>
					<li>
						<a href="#">Home 2</a>
					</li>
					<li>
						<a href="#">Home 3</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fas fa-briefcase"></i>
					About
				</a>
				<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="fas fa-copy"></i>
					Pages
				</a>
				<ul class="collapse list-unstyled" id="pageSubmenu">
					<li>
						<a href="#">Page 1</a>
					</li>
					<li>
						<a href="#">Page 2</a>
					</li>
					<li>
						<a href="#">Page 3</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fas fa-image"></i>
					Portfolio
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fas fa-question"></i>
					FAQ
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fas fa-paper-plane"></i>
					Contact
				</a>
			</li>
		</ul>

		<ul class="list-unstyled CTAs">
			<li>
				<a href="" class="download">Settings</a>
			</li>
		</ul>
	</nav>

	<!-- Page Content  -->
	<div id="content">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">

				<button type="button" id="sidebarCollapse" class="btn btn-info">
					<i class="fas fa-align-left"></i>
				</button>
				<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-align-justify"></i>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="nav navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="#">LOGOUT</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		
	</div>

</div>


<?php require 'footer.php' ?>