<form action="" method="POST">
	<input type="text" name="username" placeholder="Username" required />
	<input type="password" name="password" required />
	<input type="submit" name="submit" value="Log in" />
	<input type="reset" />
</form>
<?php echo isset($error) ? $error : NULL?>

<form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

	  
<?php echo isset($error) ? $error : NULL?>