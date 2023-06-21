var totalPrice = JSON.parse(localStorage.getItem("totalPrice")) || 0;
function updateValue() {
  var value1 = document.getElementById("drink1").value;
  var value2 = document.getElementById("drink2").value;
  var value3 = document.getElementById("drink3").value;
  var value4 = document.getElementById("drink4").value;
  totalPrice = value1 * 30 + value2 * 30 + value3 * 180 + value4 * 180;
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
  var value1 = document.getElementById("drink1").value;
  var value2 = document.getElementById("drink2").value;
  var value3 = document.getElementById("drink3").value;
  var value4 = document.getElementById("drink4").value;
  if (value1 > 0 || value2 > 0 || value3 > 0 || value4 > 0) {
    document.getElementById("total-price").innerHTML =
      "Total price: " + localStorage.getItem("totalPrice") + " TK";
  } else {
    document.getElementById("total-price").innerHTML = "Total price: 0 TK";
  }
};
