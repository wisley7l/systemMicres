console.log("MD5 wisley");


base32 = new Nibbler({
    dataBits: 8,
    codeBits: 5,
    keyString: '0123456789ABCDEFGHJKMNPQRSTVWXYZ',
    pad: '='
});


var MD5 = function (string) {

  return base32.encode(string);
}
