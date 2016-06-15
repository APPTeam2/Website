



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





formulaire();