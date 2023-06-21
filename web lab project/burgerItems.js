var totalPrice = JSON.parse(localStorage.getItem("totalPrice")) || 0;
function updateValue() {
  var value1 = document.getElementById("burger1").value;
  var value2 = document.getElementById("burger2").value;
  var value3 = document.getElementById("burger3").value;
  totalPrice = value1 * 190 + value2 * 210 + value3 * 360;
  localStorage.setItem("totalPrice", totalPrice);
  document.getElementById("total-price").innerHTML =
    "Total price: " + localStorage.getItem("totalPrice") + " TK";
}
function handlePayment() {
  if (totalPrice > 0) {
    window.location.href = "./paymentOption.html";
  } else {
    alert("Please select items");
  }
}
window.onload = (event) => {
  var value1 = document.getElementById("burger1").value;
  var value2 = document.getElementById("burger2").value;
  var value3 = document.getElementById("burger3").value;
  if (value1 > 0 || value2 > 0 || value3 > 0) {
    document.getElementById("total-price").innerHTML =
      "Total price: " + localStorage.getItem("totalPrice") + " TK";
  } else {
    document.getElementById("total-price").innerHTML = "Total price: 0 TK";
  }
};
