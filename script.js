const wrapper = document.querySelector(".wrapper"),
      qrInput = wrapper.querySelector(".form input"),
      generateBtn = wrapper.querySelector(".form button"),
      qrImg = wrapper.querySelector(".qr-code img");
let preValue;

// VARIÁVEL QUE CONFIGURA O REFRESH DA PÁGINA
var refresh = 10000; // 10 SEGUNDOS

// GERA O QRCODE QUANDO CLICA NO BOTÃO
generateBtn.addEventListener("click", () => {
  geraQR();
});

// FUNÇÃO QUE GERA O QRCODE
function geraQR(qrValue){
  // SE FOR O USUÁRIO QUE DIGITOU O NÚMERO
  if(qrValue == undefined){
    let qrValue = qrInput.value.trim();
    if (!qrValue || preValue === qrValue) return;
    preValue = qrValue;
    generateBtn.innerText = "Generating QR Code...";
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
    qrImg.addEventListener("load", () => {
      wrapper.classList.add("active");
      generateBtn.innerText = "Generate QR Code";
    });
  // CASO SEJA PASSADO O VALOR ALEATÓRIO QUE FOI GERADO
  } else {
    generateBtn.innerText = "Generating QR Code...";
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
    qrImg.addEventListener("load", () => {
      wrapper.classList.add("active");
      generateBtn.innerText = "Generate QR Code";
    });
  }
}

qrInput.addEventListener("keyup", () => {
  if (!qrInput.value.trim()) {
    wrapper.classList.remove("active");
    preValue = "";
  }
});

// GERA UM VALOR ALEATÓRIO
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// FUNÇÃO PADRÃO DO AJAX
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
  // MUDA O VALOR DO INPUT E O QRCODE
  xmlHttp.onreadystatechange = function () {
    if (xmlHttp.readyState == 4) {
      const valor = getRandomInt(10, 100);
      document.getElementById("myform").value = valor;
      // MUDANDO QR CODE JUNTO COM O VALOR DO INPUT
      geraQR(valor)
      // CONFIGURA O TEMPO DO REFRESH
      setTimeout("Ajax()", refresh);
    }
  };
  // ARQUIVO CONFIGURADO SOMENTE PARA REMOVER ERRO DO CONSOLE
  xmlHttp.open("GET", "teste_get.php", true);
  xmlHttp.send(null);
}

// EXECUTA O AJAX
window.onload = function () {
  setTimeout("Ajax()", refresh);
};
