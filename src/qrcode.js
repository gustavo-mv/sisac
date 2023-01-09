var jimp = require("jimp")
var fs = require('fs')
var qrCode = require('qrcode-reader')

// LENDO A IMAGEM EM PNG
var buffer = fs.readFileSync(__dirname + '/image.png');

// PARSING THE IMAGE 
qrcode_img_return = jimp.read(buffer, function(err, image){
    if(err) {
        // CASO OCORRA ERRO DURANTE A LOCALIZAÇÃO DA IMAGEM OU OUTROS EXECUTA AQUI
        console.error(err);
    }

    let qrcode = new qrCode();
    qrcode.callback = function(err, value){
        if(err){
            // CASO OCORRA ERRO DURANTE A LEITURA DO QRCODE EXECUTA ESSE ESCOPO DE CÓDIGO
            console.error(err);
        }
        // SE LER O QRCODE CORRETAMENTE VAI EXECUTAR ESSE ESCOPO
        console.log(value.result);
    }
    qrcode.decode(image.bitmap)
});

module.exports = () => {
    return qrcode_img_return;
}
