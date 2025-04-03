// validate.js

function validateForm() {
  var form = document.getElementById('signup-form');
  var formData = new FormData(form);

  // Get the values from the form
  var email = formData.get('email');
  var username = formData.get('signup_username');
  var password = formData.get('signup_password');

  // Create a variable to hold error messages
  var errors = [];

  // Validate email
  if(!email){
    errors.push("The Email is Required");
  } else if(!validateEmail(email)){
    errors.push("You Entered a non-valid Email");
  }

  // Validate username
  if(!username){
    errors.push("Username is Required");
  } else if(!validateUsername(username)){
    errors.push("You Entered a non-Valid Name");
  }

  // Validate password
  if(!password){
    errors.push("Password is Required");
  } else if(!validatePassword(password)){
    errors.push("You Entered a non-Valid Password");
  }

  // If there are any errors, prevent form submission and alert the errors
  if(errors.length > 0){
    event.preventDefault();
    alert(errors.join("\n"));
  }
}

function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function validateUsername(username) {
  var re = /^[a-zA-Z' ]+$/;
  return re.test(username);
}

function validatePassword(password) {
  // Check for password validity here. As an example, I'm checking for minimum length of 6.
  return password.length >= 6;
}

// Attach the function to the form's submit event
document.getElementById('signup-form').addEventListener('submit', validateForm);
