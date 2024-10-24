<div class="container text-align-center">
  <h1 class="heading">Sign Up</h1>


  <form action="../server/requests.php" method="POST">
    <div class="col-10 offset-sm margin-bottom-15">
        <label for="username">User Name</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="enter user name" required>
    </div>

    <div class="col-10 offset-sm margin-bottom-15">
        <label for="email">User Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="enter user email" required>
    </div>

    <div class="col-10 offset-sm margin-bottom-15">
        <label for="password">User Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="enter user password" required>
    </div>

    <div class="col-10 offset-sm margin-bottom-15">
        <label for="address" class="form-label">User Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="enter user address" required>
    </div>

    <button type="submit" class="btn-primary">Submit</button>
</form>




</div>
