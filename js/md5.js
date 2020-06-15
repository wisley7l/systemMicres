console.log("MD5 wisley");

//+ Jonas Raoni Soares Silva
//# http://jsfromhell.com/string/rot13 [rev. #1]
String.prototype.rot13 = function(){
    return this.replace(/[a-zA-Z]/g, function(c){
    return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
    });
};
// var s = "My String";
// var enc = s.rot13(); // encrypted value in enc


var MD5 = function (string) {
  return string.rot13();
}
