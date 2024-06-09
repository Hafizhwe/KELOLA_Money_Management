function validasiLogin() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  var data = {
    username: username,
    password: password,
  };

  if (username.trim() === "" || password.trim() === "") {
    alert("Username and password are required");
    return false;
  }

  fetch("validate_login.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  }).then((res) => {
    if (res.status === 200) {
      res.json().then((userData) => {
        console.log(userData.user.id);
        localStorage.setItem("userId", userData.user.id);
        localStorage.setItem("username", userData.user.username);
        localStorage.setItem("fullname", userData.user.fullname);
        localStorage.setItem("email", userData.user.email);
      });
      window.location.href = "../dashboard";
    } else if (res.status === 400) {
      alert("Login unsuccessful, please check your username and password!");
      throw new Error("Login failed");
    }
  });
}
