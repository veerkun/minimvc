<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">User Login</h3>
  </div>
  <div class="panel-body">
  	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"> 
  		 <div class="form-group">
  			<label>email</label>
  			<input type="text" name="email" class="form-control">
  		 </div> 
  		 <div class="form-group">
  			<label>Password</label>
  			<input type="password" name="password" class="form-control">
  		 </div>

  		 <input type="submit" name="submit" class="btn btn-primary" value="Login">
  	</form>

  </div>
</div>
