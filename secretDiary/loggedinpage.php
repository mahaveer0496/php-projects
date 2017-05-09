<?php
session_start();
if (array_key_exists("id", $_SESSION)) {
    $text = "Log Out";
} else {
    header("Location: index.php");
}
?>

   <!doctype html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Title</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
         crossorigin="anonymous">
      <style>
         textarea {
            height: 80vh;
         }
      </style>
   </head>

   <body>
      <a name="" id="" class="btn btn-primary" href="index.php?logout=1" role="button"><?php echo $text;?></a>
      <div class="container-fluid">

         <div class="form-group">
            <textarea class="form-control text" name="" id="" rows="3" placeholder="Enter your deepest thoughts"></textarea>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
         crossorigin="anonymous"></script>

      <script>
      let text = document.querySelector('.text');
      text.addEventListener('keypress', (e)=>{
         let content = e.target.value
         $.ajax({
            type: "POST",
            url: "updatedb.php",            
            data: {content}
            }).done(function(data){
               console.log('do nothing')
            })


      })
      </script>
   </body>

   </html>
