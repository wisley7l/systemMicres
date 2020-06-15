console.log("MD5 wisley");

var MD5 = function (string) {
  var carcteres = string.split('');
  for (var i = 0; i < carcteres.length; i++) {
    carcteres[i] = carcteres[i].charCodeAt(0);
  }
  // console.log(carcteres.join("x"));
  return carcteres.join("x");
}


base32 = new Nibbler({
    dataBits: 8,
    codeBits: 5,
    keyString: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567',
    pad: '='
});
console.log(base32.encode("Hello, World"); );
console.log(base32.decode("IFWG62DB"); );
// base32.encode("Hello, World");  // "JBSWY3DPFQQFO33SNRSCC====="
// base32.decode("IFWG62DB");      // "Aloha"
