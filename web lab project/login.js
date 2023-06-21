function handleLogin() {
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  let savedUsers = JSON.parse(localStorage.getItem("users")) || [];
  index = savedUsers.findIndex((user) => user.username === username);
  if (index > -1) {
    if (savedUsers[index].password === password) {
      window.location.href = "./items.html";
    } else {
      alert("Password does not match");
    }
  } else {
    alert("User does not exist");
  }
}
