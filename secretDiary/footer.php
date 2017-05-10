<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
   crossorigin="anonymous"></script>
<script>
   let loginForm = document.querySelector(".login");
   let signupForm = document.querySelector(".signup");
   let loginButton = document.querySelector(".loginbtn");
   let signupButton = document.querySelector(".signupbtn");
   let text = document.querySelector('.text');
   if (loginButton && signupButton) {
      loginButton.addEventListener('click', () => {
         signupForm.style.display = "none";
         loginForm.style.display = "block";
      })

      signupButton.addEventListener('click', () => {
         loginForm.style.display = "none";
         signupForm.style.display = "block";
      })
   }
   if (text) {
      text.addEventListener('keypress', (e) => {
         let content = e.target.value;
         $.ajax({
            type: "POST",
            url: "updatedb.php",
            data: {
               content
            }
         }).done(function (data) {
            console.log('do nothing')
         })
      })
   }
</script>
</body>

</html>