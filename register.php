<html>

<head>
	<title>Welcome to Travel Buddy</title>
	
	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<!-- Custom Stylesheet -->
	<link href="assets/css/register.css" rel="stylesheet">
</head>


<body>


	<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg transparent navbar-dark fixed-top">
       	<a class="navbar-brand" href="#">Navbar</a>
       	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   		    <span class="navbar-toggler-icon"></span>
       	</button>
       	<div class="collapse navbar-collapse" id="navbarNavDropdown">
      	    <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">ABOUT<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">LOGIN</a>
              </li>
              
            </ul>
       	</div>
    </nav>


    <!-- Form -->
	<div class="container form-container">
				<form>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <input type="text" class="form-control margin-bottom" id="fname" placeholder="First Name">
			    </div>
			    <div class="form-group col-md-6">
			      <input type="text" class="form-control margin-bottom" id="lname" placeholder="Last Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control margin-bottom" id="email" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <input type="Password" class="form-control margin-bottom" id="password" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
				</form>
	</div>
	

</body>

</html>