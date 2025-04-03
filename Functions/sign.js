// signin.js
document.addEventListener('DOMContentLoaded', function() {
  var signinForm = document.querySelector('.sign-in-form');
  signinForm.addEventListener('submit', function(event) {
    var username = document.querySelector('input[name="username"]');
    var password = document.querySelector('input[name="password"]');
    if (!username.value.trim() || !password.value.trim()) {
      alert('Both fields are required!');
      event.preventDefault();
    }
  });
});

// signup.js
document.addEventListener('DOMContentLoaded', function() {
  var signupForm = document.querySelector('.sign-up-form');
  signupForm.addEventListener('submit', function(event) {
    var fullname = document.querySelector('input[name="fullname"]');
    var username = document.querySelector('input[name="signup_username"]');
    var phone = document.querySelector('input[name="phone"]');
    var email = document.querySelector('input[name="email"]');
    var password = document.querySelector('input[name="signup_password"]');
    
    if (!fullname.value.trim() || !username.value.trim() || !phone.value.trim() || !email.value.trim() || !password.value.trim()) {
      alert('All fields are required!');
      event.preventDefault();
    } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email.value.trim())) {
      alert('Invalid Email!');
      event.preventDefault();
    }
  });
});
