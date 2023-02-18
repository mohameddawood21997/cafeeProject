<?php 

session_start();
if(!isset($_SESSION['admin_id'])){
    header('Location:../login.php');
}

require '../include/function.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style>
   body{
    background: url("https://www.nextdaycoffee.co.uk/media/xt-adaptive-images/480/images/fullwidthbg/fwcta_caferoma.jpg");
    background-size: cover;
    background-repeat: no-repeat;
   background-origin: border-box;
 }
  form{
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    width: 500px;
    border-radius: 10px;
    box-shadow: 10px 5px 4px rgba(0, 0, 0, 0.5);
  }
  @media screen and (max-width: 520px) {
form {
  width: 400px;
}
}
 form  button {
    background-color: #7b3826;
    outline: none;
    padding: 10px;
    transition: 0.5s;
    border-radius: 10px;
    outline: none;
    border: none;
    color:#fff;
}
</style>
</head>
<body>

<form action="../handler/addUsers.php" class="mt-5  mx-auto row" method="post"  enctype="multipart/form-data"> 
  <h2 class="text-center">Add User</h2>
  <small id="formError" class="form-text text-danger mt-2"> </small>
<div class="mb-3 col-12">
  <label for="exampleFormControlInput2" class="form-label">Name</label>
  <input type="text" class="form-control" name="Uname" id="nameInput" >
  <small id="nameError" class="form-text text-danger"> </small>
</div>
<div class="mb-3 col-12 col-md-6">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" name="email" id="emailInput" placeholder="name@example.com">
  <small id="emailError" class="form-text text-danger "></small>
</div>
<div class="mb-3 col-12 col-md-6">
  <label for="exampleFormControlInput3" class="form-label">password </label>
  <input type="password" class="form-control" name="password" id="passwordInput" required >
  <small id="passwordError" class="form-text text-danger "></small>

</div>
<div class="mb-3 col-12 col-md-6">
  <label for="exampleFormControlInput3" class="form-label">Conform password </label>
  <input type="password"  name="Cpassword" class="form-control" id="confirmPasswordInput" required>
  <small id="confirmPasswordError" class="form-text text-danger "></small>
</div>
<div class="mb-3 col-12 col-md-6">
  <label for="exampleFormControlInput3" class="form-label">Phone </label>
  <input type="number"  name="phone" class="form-control" id="phoneInput" required>
  <small id="phoneError" class="form-text text-danger "></small>
  </div>
</div>
<div class="mb-3 col-12 col-md-6">
  <label class="form-label" for="form2Example27">Choose Room</label>
<select class="form-select" name="room" aria-label="Default select example">
  <option value="room1">room1</option>
  <option value="room2">room2</option>
  <option value="room3">room3</option>
</select>
</div>
<div class="mb-3 col-12 col-md-6">
  <label for="exampleFormControlInput5" class="form-label">Pecture</label> </label>
  <input type="file"  name="file" class="form-control" id="fileInput" >
  <small id="fileError" class="form-text text-danger "></small>
  </div>
</div>
<div class="mb-3 text-center">
<button type="submit" name='submit' class=" mt-3  w-25">Sign Up</button>
</div>
</form>
<script>
  let valid =true;
  var nameInput = document.getElementById("nameInput");
  nameInput.addEventListener('keyup',()=>{
    var nameError = document.getElementById("nameError");
			var name = nameInput.value;
			if (name == "") {
				nameError.innerHTML = "Please enter your name";
				nameInput.classList.add("is-invalid");
        valid =false;
			} else {
				nameError.innerHTML = "";
				nameInput.classList.remove("is-invalid");
        valid =true;
			}
  })
  
  var emailInput = document.getElementById("emailInput");

  emailInput.addEventListener('keyup',()=>{
    var emailError = document.getElementById("emailError");
			var email = emailInput.value;
			if (email == "") {
				emailError.innerHTML = "Please enter your email";
				emailInput.classList.add("is-invalid");
        valid =false;
			} else if (!/^([a-zA-Z0-9._-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,5})$/.test(email)) {
				emailError.innerHTML = "Please enter a valid email address";
				emailInput.classList.add("is-invalid");
        valid =false;
			} else {
				emailError.innerHTML = "";
				emailInput.classList.remove("is-invalid");
        emailInput.classList.add("invalid");
        valid =true;
			}
  })

  //password Validation 
  var passwordInput = document.getElementById("passwordInput");
  passwordInput.addEventListener('keyup',()=>{
    var passwordError = document.getElementById("passwordError");
			var password = passwordInput.value;
			if (password == "") {
				passwordError.innerHTML = "Please enter a password";
        valid =false;
				passwordInput.classList.add("is-invalid");
			} else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(password)) {
				passwordError.innerHTML = "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one number";
				passwordInput.classList.add("is-invalid");
        valid =false;
			} else {
				passwordError.innerHTML = "";
				passwordInput.classList.remove("is-invalid");
        valid =true;
        emailInput.classList.add("invalid");

			}
  })

		
  var confirmPasswordInput = document.getElementById("confirmPasswordInput");
  confirmPasswordInput.addEventListener('keyup',()=>{
    var confirmPasswordError = document.getElementById("confirmPasswordError");
			var confirmPassword = confirmPasswordInput.value;
			var password = document.getElementById("passwordInput").value;
			if (confirmPassword == "") {
				confirmPasswordError.innerHTML = "Please confirm your password";
				confirmPasswordInput.classList.add("is-invalid");
        valid =false;
			} else if (password != confirmPassword) {
				confirmPasswordError.innerHTML = "Passwords do not match";
				confirmPasswordInput.classList.add("is-invalid");
        valid =false;
			} else {
				confirmPasswordError.innerHTML = "";
				confirmPasswordInput.classList.remove("is-invalid");
        valid =true;
			}
  })

    var phoneInput = document.getElementById("phoneInput");
    phoneInput.addEventListener('keyup',()=>{
      var phoneError = document.getElementById("phoneError");
			var phone = phoneInput.value;
			if (phone == "") {
				phoneError.innerHTML = "Please enter your phone number";
				phoneInput.classList.add("is-invalid");
        valid =false;
			}
       else if (!/^[0-9]{11}$/.test(phone)) {
        phoneError.innerHTML = "phone shoud be 11 number";
				phoneInput.classList.add("is-invalid");
        valid =false;
      }
      else{
        phoneError.innerHTML = "";
				phoneInput.classList.remove("is-invalid")
        valid =true;
      }
    })
   
    var fileInput = document.getElementById("fileInput");
    fileInput.addEventListener("change",()=>{
      var fileError = document.getElementById("fileError");
	var file = fileInput.value;
	if (file == "") {
		fileError.innerHTML = "Please select a file";
    valid =false;
		fileInput.classList.add("is-invalid");
	} else if (!/\.(jpg|jpeg|png|gif)$/i.test(file)) {
		fileError.innerHTML = "Please select a valid image file (jpg, jpeg, png, gif)";
		fileInput.classList.add("is-invalid");
    valid =false;
	} else {
		fileError.innerHTML = "";
		fileInput.classList.remove("is-invalid");
    valid =true;   
	}
    })
    const form = document.getElementsByTagName('form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevents the form from submitting normally
  let formError = document.getElementById('formError')
  if (valid) {
    form.submit(); 
  } else {
    formError.innerHTML="Please fill out all required fields"
  }})
</script>
</body>
</html>