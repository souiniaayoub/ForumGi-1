<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/loginnew.css" />
    <title>Gestion des Notes</title>
  </head>
  <body>
    <div class="forms-container">
      <form action="inc/login.inc.php" method="post" class="login">
        <input type="email" placeholder="Email" name="email" />
        <input type="password" placeholder="Password" name="password" />
        <div>
          <button type="submit" name="singIn">login</button>
          <button class="signup-btn" type="button">signup</button>
        </div>
      </form>
      <form action="inc/signup.inc.php" method="post" class="signup">
        <input type="text" placeholder="Full Name" name="userName" />
        <input type="text" placeholder="CNE" name="cne" />
        <input type="email" placeholder="Email" name="email" />
        <input type="password" placeholder="Password" name="password" />
        <div>
          <div class="custom-control custom-radio custom-control-inline">
            <input
              type="radio"
              class="custom-control-input"
              id="syear"
              name="year"
              value="1"
            />
            <label class="custom-control-label" for="syear">Second Year</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input
              type="radio"
              class="custom-control-input"
              id="fyear"
              name="year"
              value="2"
            />
            <label class="custom-control-label" for="fyear">First Year</label>
          </div>
        </div>
        <div>
          <button class="login-btn" type="button">login</button>
          <button type="submit" name="singUp">signup</button>
        </div>
      </form>
      <div class="logo-details">
        <h3>FORUM<span>INO</span></h3>
        <img src="images/logo.png" alt="assets/logo.png" />
      </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/anime/lib/anime.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/loginnew.js"></script>
  </body>
</html>
