<div class="container text-align-center">
  <h1 class="heading">Login</h1>

  <form style="margin-top: 80px;" action="../server/requests.php" method="POST">
    <div class="col-10 offset-sm margin-bottom-15">
      <label fo r="email">User Email</label>
      <input
        type="text"
        class="form-control"
        id="email"
        name="email"
        aria-describedby="emailHelp"
        placeholder="Enter user email"
      />
    </div>

    <div class="col-10 offset-sm margin-bottom-15">
      <label for="password">User Password</label>
      <input
        type="password"
        class="form-control"
        id="password"
        name="password"
        placeholder="Enter user password"
      />
    </div>

    <button type="submit" class="btn-primary" name="login">Login</button>
  </form>
</div>