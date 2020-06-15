console.log("MD5 wisley");

var MD5 = function (string) {
  var carcteres = string.split('');
  for (var i = 0; i < carcteres.length; i++) {
    carcteres[i] = carcteres[i].charCodeAt(0);
  }
  // console.log(carcteres.join("x"));
  return carcteres.join("x");
}
