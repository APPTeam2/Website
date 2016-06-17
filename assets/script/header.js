/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */



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


function option()
{
    var url = window.location.href.split( '/' );
    var len = url.length;
    var moins= len - 5;//-4 à la racine
    var url_f="";
    var i = 0;
    for (; i < len-moins; i++) 
    {
      url_f=url_f+(url[i]);
      url_f=url_f+('/');
    }

    url_para=url_f+"parametre"+'/'+"c1";

    $formulaire_login=$('#formulaire_co_js');
    $formulaire_login.after("<li>"+'<a href="'+url_para+'"><img src="'+url_f+'assets/img/parametre.jpg" id="logo_titre" alt="Logo titre"/></a>'+"</li>");

}




option();

formulaire();
