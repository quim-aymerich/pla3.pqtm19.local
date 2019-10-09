/**
 * Crea una cookie con los valores de los parametros
 * 
 * @param string  name Nombre de la Cookie
 * @param string  value Valor de la Cookie
 * @param integer expires Meses de validez de la cookie
 * @param string path Ruta de validez de la Cookie; Ejemplo '/'
 * @param string domain Dominio de validez de la cookie ; Ejemplo :''
 * @returns none
 */
function createCookie(name, value, expires, path, domain) {
  var curdate = new Date();
  curdate.setMonth(curdate.getMonth() + expires);
  var cookieExpires = curdate.toUTCString();
  var txtCookie = name + "=" + encodeURIComponent(value) + "; expires= "
      + cookieExpires + ";path=" + path + "; domain=" + domain;
  document.cookie = txtCookie;
}

/**
 * Leer el contenido de una cookie
 * 
 * @param string name Nombre de la Cookie
 * @returns boolean Falso si no existe la cookie, string valor de la cookie
 */
function getCookie(name) {
  var search_cookie = name + "=";
  if (document.cookie.length > 0) {
    var start_position = document.cookie.indexOf(search_cookie)
    if (start_position != -1) {
      start_position += search_cookie.length
      var end_position = document.cookie.indexOf(";", start_position)
      if (end_position == -1){
        end_position = document.cookie.length;
      }
      return (decodeURIComponent(document.cookie.substring(
          start_position, end_position)))
    } else {
      return false;
    }
  }else{
    return false;
  }
}

/**
 * Elimina una Cookie determinada
 * 
 * @param string name Nombre de la Cookie
 * @param string path Ruta de validez de la Cookie; Ejemplo '/'
 * @returns
 */
function deleteCookie(name,path){
  createCookie(name,"",-1,path,"");
}