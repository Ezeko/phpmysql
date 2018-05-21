<!DOCTYPE html>
<html>
<head>
	<title>Registration page</title>
</head>
<body>
<form method="POST" action="register_user.php" >
	<p><label for ="name"> NAME: </label>
	<input type="text" name="fullname" id="fullname" required="" /></p>
	<p><label for ="username"> USERNAME: </label>
	<input type="text" name="username" id="username" required="" /></p>
	<p><label for ="name"> HOME ADDRESS: </label>
	<input type="text" name="address" id="address" required="" /></p>
	<p><label for ="name"> EMAIL: </label>
	<input type="text" name="email" id="email" required="" /></p>
	<p><label for ="name"> PASSWORD: </label>
	<input type="password" name="password" id="password" required="" /></p>
	<p><input type="submit" name="Register"></p>


</form>
</body>
</html>