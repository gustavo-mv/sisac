const wrapper = document.querySelector(".wrapper"),
  qrInput = wrapper.querySelector(".form input"),
  generateBtn = wrapper.querySelector(".form button"),
  qrImg = wrapper.querySelector(".qr-code img");
let preValue;

generateBtn.addEventListener("click", () => {
  let qrValue = qrInput.value.trim();
  if (!qrValue || preValue === qrValue) return;
  preValue = qrValue;
  generateBtn.innerText = "Generating QR Code...";
  qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
  qrImg.addEventListener("load", () => {
    wrapper.classList.add("active");
    generateBtn.innerText = "Generate QR Code";
  });
});

qrInput.addEventListener("keyup", () => {
  if (!qrInput.value.trim()) {
    wrapper.classList.remove("active");
    preValue = "";
  }
});

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
function Ajax() {
  var xmlHttp;
  try {
    xmlHttp = new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
  } catch (e) {
    try {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
    } catch (e) {
      try {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        alert("No AJAX!?");
        return false;
      }
    }
  }
  xmlHttp.onreadystatechange = function () {
    var refresh = 100000; // 10 sec; change it if you want
    if (xmlHttp.readyState == 4) {
      const valor = getRandomInt(10, 100);
      document.getElementById("myform").value = valor;
      setTimeout("Ajax()", refresh);
    }
  };
  xmlHttp.open("GET", "http://example.com/script_that_refreshes_var.php", true);
  xmlHttp.send(null);
}

window.onload = function () {
  setTimeout("Ajax()", refresh);
};
