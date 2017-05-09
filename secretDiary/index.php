<?php
session_start();
mail('mahaveersharma0496@yahoo.com', 'hi', 'hello', "From: goooo");
$error = "";
if (array_key_exists("logout", $_GET)) {
    unset($_SESSION["id"]);
} elseif (array_key_exists("id", $_SESSION)) {
    header("Location: loggedinpage.php");
}
if (array_key_exists("submit", $_POST)) {
    $link = mysqli_connect("localhost", "root", "", "user");
    if (mysqli_connect_error()) {
        die("Error in connectiing to db");
    }
    if (!$_POST["email"]) {
        $error .= "Email is required";
    }
    if (!$_POST["password"]) {
        $error .= "password is required";
    }
   
    if ($error != '') {
        $error = "<p>There were errors in your form</p>".$error;
    } else {
        if ($_POST['signUp'] == 1) {
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                $error = "That email is taken";
            } else {
                $query = "INSERT INTO users (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";

                if (!mysqli_query($link, $query)) {
                    $error = "Couldnt sign up pls try later";
                    echo mysqli_error($link);
                } else {
                    $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
                    mysqli_query($link, $query);
                    $_SESSION["id"] = mysqli_insert_id($link);
                    header("Location: loggedinpage.php");
                    echo "sign up success";
                }
            }
        } else {
            $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            if (array_key_exists("id", $row)) {
               $hashedPassword = md5(md5($row["id"]).$_POST["password"]);
               if ($hashedPassword == $row['password']) {
                  $_SESSION['id'] = $row['id'];
                  header("Location: loggedinpage.php");
               }
            }
        }
    }
}
?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Secret Diary</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
         crossorigin="anonymous">
      <style>
         .signup {
            display: none
         }
      </style>
   </head>

   <body>
      <div class="container">
         <div id="error" class="text-center lead">
            <?php echo  $error;?>
         </div>
         <div class="row">
            <div class="col-6 offset-3">
               <form class="signup" method="post">
                  <div class="form-group">
                     <label for="">Email</label>
                     <input type="text" name="email" class="form-control" placeholder="enter email" aria-describedby="helpId">
                     <label for="">Password</label>
                     <input type="password" name="password" class="form-control" placeholder="enter password" aria-describedby="helpId">
                     <input type="hidden" name="signUp" value="1">
                     <input class="btn btn-primary" name="submit" type="submit" value="Sign Up">
                  </div>
                  <a class="loginbtn" href="#">Login</a>

               </form>

               <form class="login" method="post">
                  <div class="form-group">
                     <label for="">Email</label>
                     <input type="text" name="email" class="form-control" placeholder="enter email" aria-describedby="helpId">
                     <label for="">Password</label>
                     <input type="password" name="password" class="form-control" placeholder="enter password" aria-describedby="helpId">
                     <input type="hidden" name="signUp" value="0">

                     <input class="btn btn-primary" name="submit" type="submit" value="Log In">
                  </div>
                  <a class="signupbtn" href="#">Sign Up</a>
               </form>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
         crossorigin="anonymous"></script>
      <script>
         let loginForm = document.querySelector(".login");
         let signupForm = document.querySelector(".signup");
         let loginButton = document.querySelector(".loginbtn");
         let signupButton = document.querySelector(".signupbtn");
         loginButton.addEventListener('click', () => {
            signupForm.style.display = "none";
            loginForm.style.display = "block";

         })
         signupButton.addEventListener('click', () => {
            loginForm.style.display = "none";
            signupForm.style.display = "block";
         })
      </script>
   </body>

   </html>