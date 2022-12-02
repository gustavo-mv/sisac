<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">
      <header>
        <h1>QR Code Generator</h1>
        <p>Paste a url or enter text to create QR code</p>
      </header>
      <div class="form" name="form">
        <input type="text" id="myform" spellcheck="false" onchange="myfunction()" placeholder="Enter text or url">
        <button>Generate QR Code</button>
      </div>
      <div class="qr-code">
        <img src="" alt="qr-code">
      </div>
    </div>
    <script src="script.js"></script>
</body>
</html>