console.log("MD5 wisley");

function enc(str) {
    var encoded = "";
    for (i=0; i<str.length;i++) {
    var a = str.charCodeAt(i);
    var b = a ^ 123; // bitwise XOR with any number, e.g. 123
    encoded = encoded+String.fromCharCode(b);
    }
    return encoded;
}


var MD5 = function (string) {
  return enc(string);
}
