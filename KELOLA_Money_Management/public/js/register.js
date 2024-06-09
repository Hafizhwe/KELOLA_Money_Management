function registerUser() {
  var fullName = document.getElementById("fullName").value;
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm_password").value;

  if (password !== confirmPassword) {
    alert("Password and confirm password do not match");
    return;
  }

  var data = {
    fullName: fullName,
    username: username,
    email: email,
    password: password,
  };

  fetch("register.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((res) => {
      console.log(res);
      if (res.status == 200) {
        alert("Registration Successful");
        window.location.href = "../login/login.html";
      } else if (res.status == 400) {
        alert("Registration Unsuccessful");
      }
    })
    .catch((err) => {
      console.error(err);
    });
}
