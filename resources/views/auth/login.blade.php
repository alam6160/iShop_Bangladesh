<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: -webkit-linear-gradient(left, #a445b2, #fa4299);
}
::selection{
  background: #fa4299;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title{
  font-size: 35px;
  font-weight: 600;
  text-align: center;
}
.form-container .form-inner{
  width: 100%;
}
.form-container .form-inner form{
  width: 100%;
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #fc83bb;
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #b3b3b3;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .pass-link a{
  color: #fa4299;
  text-decoration: none;
}
.form-inner form .pass-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #a445b2, #fa4299, #a445b2, #fa4299);
  border-radius: 5px;
  transition: all 0.4s ease;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;

  .test{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #a445b2, #fa4299, #a445b2, #fa4299);
  border-radius: 5px;
  transition: all 0.4s ease;
}
}

   </style>
   <body>
      <div class="wrapper">
         <div class="title test">
            <div class="btn-layer"></div>
            Login Form
         </div>
         <div class="form-container">
            <div class="form-inner">
               <form action="#" class="login">
                  <div class="field">
                     <input type="text" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div>
               </form>
            </div>
         </div>
      </div>





      <button id="openModalBtn">Open Login</button>

      <div id="loginModal" class="modal">
          <div class="modal-content">
              <span class="close-btn">&times;</span>
              <div class="wrapper">
                  <div class="title-text">
                      <div class="title login">Login Form</div>
                  </div>
                  <div class="form-container">
                      <div class="form-inner">
                          <form action="#" class="login">
                              <div class="field">
                                  <input type="text" placeholder="Email Address" required>
                              </div>
                              <div class="field">
                                  <input type="password" placeholder="Password" required>
                              </div>
                              <div class="pass-link">
                                  <a href="#">Forgot password?</a>
                              </div>
                              <div class="field btn">
                                  <div class="btn-layer"></div>
                                  <input type="submit" value="Login">
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <script>
          const modal = document.getElementById("loginModal");
          const btn = document.getElementById("openModalBtn");
          const closeBtn = document.getElementsByClassName("close-btn")[0];

          btn.onclick = function() {
              modal.style.display = "block";
          }

          closeBtn.onclick = function() {
              modal.style.display = "none";
          }

          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }
      </script>
   </body>
</html>
