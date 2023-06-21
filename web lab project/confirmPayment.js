function confirmPayment(event) {
  event.preventDefault();
  let mobileNum = document.getElementById("mobileNum").value;
  let pin = document.getElementById("pin").value;
  console.log(document.getElementById("pin").value);
  if (mobileNum == "01873898900" && pin == "2983") {
    window.location.href = "./paymentConfirmation.html";
  } else {
    alert("Invalid mobile number or pin");
  }
}
window.onload = (event) => {
  document.getElementById("total-amount").innerHTML =
    localStorage.getItem("totalPrice") + " TK";
};
