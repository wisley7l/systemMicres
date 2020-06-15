console.log("MD5 wisley");


function encode1(str) {
  var encoded = "";
  for (i=0; i<str.length;i++) {
  var a = str.charCodeAt(i);
  var b = a ^ 51; // bitwise XOR with any number, e.g. 123
  encoded = encoded+String.fromCharCode(b);
  }
  return encoded;
}



base32 = new Nibbler({
    dataBits: 8,
    codeBits: 5,
    keyString: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567',
    pad: '='
});


var MD5 = function (string) {

  return encode1(string);
}
