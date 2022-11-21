function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(c_name) {
if(document.cookie.length > 0) {
c_start = document.cookie.indexOf(c_name + "=");
if(c_start != -1) {
c_start = c_start + c_name.length + 1;
c_end = document.cookie.indexOf(";", c_start);
if(c_end == -1)
c_end = document.cookie.length;
return unescape(document.cookie.substring(c_start, c_end));
}
}
return "";
}

function checkCookie(cname) {
  var resul = false;
  var username = getCookie(cname);
  if (username != "") {
    resul = true;
  }
  return resul;
}