<?php	
	require_once("/Facade/FUser.php");
	
	function login($login_username,$login_password) {
		$result = FUser::loginUser($login_username,$login_password);
		
		$errorMessage = "Başarılı giriş!";
		if(!$result) {
			$errorMessage = "Giriş başarısız!";
		}
		else{
			$_SESSION["isLogin"]=true;
			$_SESSION["isAdmin"]=false;
			if($result["userType"]==2){
				$_SESSION["isAdmin"]=true;
			}
			$_SESSION["userID"]=$result["userID"];
			$_SESSION["name"]=$result["name"];
			$_SESSION["surname"]=$result["surname"];
			//ana sayfaya yönlendir!
			header("Location: http://localhost:81/shp");
		}
		echo $errorMessage;
	} 
	
	if(isset($_POST["login_username"]) && isset($_POST["login_password"])) {

		$login_username = trim($_POST["login_username"]);
		$login_password = trim($_POST["login_password"]);
		
		login($login_username,$login_password);
	}
	
	if(isset($_POST["username"]) && isset($_POST["phone"]) && isset($_POST["identification"]) && isset($_POST["name"]) &&
		isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["birthday"]) && isset($_POST["gender"])) {

		$username = trim($_POST["username"]);
		$phone = trim($_POST["phone"]);
		$identification = trim($_POST["identification"]);
		$name = trim($_POST["name"]);
		$surname = trim($_POST["surname"]);
		$email = trim($_POST["email"]);
		$password = trim($_POST["password"]);
		$birthday = trim($_POST["birthday"]);
		$gender = trim($_POST["gender"]);
		
		$errorMessage = "";
		$result = FUser::insertUser($username,$password,$name,$surname,$identification,$birthday,$gender, $phone,$email);
		if(!$result) {
			$errorMessage = "Yeni kullanıcı kaydı başarısız!";
		}
		else{echo "kayıt tamam logine yönlendir";
			login($username,$password);
		}
		echo $errorMessage;
	}
?>


<section><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form method="POST" action="<?php $_PHP_SELF ?>">
						<input type="text" name="login_username" placeholder="Username" />
						<input type="password" name="login_password" placeholder="Password" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Keep me signed in
						</span>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form method="POST" action="<?php $_PHP_SELF ?>">
						<input class="form-control" type="text" name="username" placeholder="Username"/>
						<input class="form-control" type="number" name="identification" placeholder="Identification"/>
						<input class="form-control" type="text" name="name" placeholder="Name"/>
						<input class="form-control" type="text" name="surname" placeholder="Surname"/>
						<input class="form-control" type="number" name="phone" placeholder="Phone"/>
						<input class="form-control" type="email" name="email" placeholder="Email Address"/>
						<input class="form-control" type="password" name="password" placeholder="Password"/>
						<input class="form-control" type="text" name="birthday" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" />
						<label>
							<input class="form-control" name="gender" value="male" type="radio" checked />
							Male
						</label>
						&nbsp; &nbsp; &nbsp;
						<label>
							<input class="form-control" name="gender" value="female" type="radio" />
							Female
						</label>
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->