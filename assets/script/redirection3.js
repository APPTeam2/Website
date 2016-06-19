/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

function redirection() 
{
  var url = window.location.href.split( '/' );
  var len = url.length;
  var url_f="";
  var moins= len - 5;//-4 à la racine
  var i = 0;
  for (; i < len-moins; i++) {
      url_f=url_f+(url[i]);
      url_f=url_f+('/');
  }
  url_f=url_f+('/inscription_Ticket/ticket');
  document.location.href=url_f; 

}

function wait()
{
  setTimeout(redirection, 3000); 
}



wait();