var users = JSON.parse(localStorage.getItem("users")) || [];
console.log(users);
function handleSignUp() {
  let savedUsers = JSON.parse(localStorage.getItem("users"));
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirmPassword").value;
  let username = document.getElementById("username").value;
  let checkUser = false;
  if (users.length > 0) {
    checkUser = savedUsers.some((user) => user.username === username);
  }
  if (checkUser) {
    alert("User already exists");
  } else {
    if (password === confirmPassword) {
      let user = {
        username: username,
        password: password,
      };
      users.push(user);
      localStorage.setItem("users", JSON.stringify(users));
      window.location.href = "./login.html";
    } else {
      alert("Password does not match");
    }
  }
}
