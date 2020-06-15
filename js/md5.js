console.log("MD5 wisley");

var MD5 = function (string) {
  var carcteres = string.split('');
  for (var i = 0; i < carcteres.length; i++) {
    carcteres[i] = parseInt(carcteres[i]);

  }
  console.log(carcteres);
}
