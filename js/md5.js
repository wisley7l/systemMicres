console.log("MD5 wisley");

base32 = new Nibbler({
    dataBits: 8,
    codeBits: 5,
    keyString: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567',
    pad: '='
});


var MD5 = function (string) {

  return base32.encode(string);
}
