<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/master.css">
      <title>Simple Home Cloud</title>
  </head>
  
  <body>
    <ul>
     <li><a class="active" href="index.html">LOG IN</a></li>
     <li><a href="about.html">ABOUT</a></li>
    </ul>

    <div class="header">
      <h1 align="center">Simple Home Cloud</h1>
    </div>

     <main>
        <div class="login" align="center">
          <h1>Log in</h1>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <input type="email" placeholder="Email" name="email" required="required" />
                  <br> <br>
                  <input type="password" placeholder="Password" name="pswd" required="required" />
                  <br> <br>
                  <button type="submit" class="">log in</button>
              </form>
        </div>
     </main>

    <div class="footer">
    </div>

    <?php 

      require './back-end/auth.php';

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $auth_manager = new auth_manager($_SERVER['REQUEST_URI'],$_POST,"/auth" );
        $auth_manager->auth(); 
      
        echo '<pre>';
        var_dump($auth_manager);
        echo '</pre>';


      }

      
    ?>

  </body>

</html>
