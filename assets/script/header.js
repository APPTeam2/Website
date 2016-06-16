



function formulaire() {
    $formulaire_login=$('#formulaire_co_js');
    $formulaire_login.show();


    $login=$('ol');
    $login.hide();

    $nav=$('#texte_titre');
    $nav.after("");



    $formulaire_login.on
    ( 'click', function () 
        {
            $login.show();
        }
    );


}


function redirection() 
{
  var url = window.location.href.split( '/' );
  var len = url.length;
  var url_f="";

  var i = 0;
  for (; i < len-2; i++) {
      url_f=url_f+(url[i]);
      url_f=url_f+('/');
  }
  document.location.href=url_f; 

}

function option()
{
    var url = window.location.href.split( '/' );
    var len = url.length;
    var url_f="";
    var i = 0;
    for (; i < len-2; i++) 
    {
      url_f=url_f+(url[i]);
      url_f=url_f+('/');
    }

    $formulaire_login=$('#formulaire_co_js');
    $formulaire_login.after("<li>"+'<img src="'+url_f+'assets/img/logo_titre.jpg" id="logo_titre" alt="Logo titre"/>'+"</li>");

}


option();

formulaire();

