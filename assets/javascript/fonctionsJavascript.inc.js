/** Fonctions Javascript
 * 
 * @author Antoine RICHARD
 * @date 14/06/2016
 * @version 1.0
 */

function gotoUrl($url) {
    window.location = $url;
}

// validation création utilisateur
function valider()
{
    var ok = 1;

    if (document.getElementById('civilite').value == "")
    {
        alert("Veuillez indiquer une civilité.");
        ok = 0;
        document.getElementById('civilite').focus();
        return false;
    }
    if (document.getElementById('nom').value == "")
    {
        alert("Veuillez indiquer un nom.");
        ok = 0;
        document.getElementById('nom').focus();
        return false;
    }
    if (document.getElementById('prenom').value == "")
    {
        alert("Veuillez indiquer un prenom.");
        ok = 0;
        document.getElementById('prenom').focus();
        return false;
    }

    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    if (document.getElementById('mail').value == "")
    {
        alert("Veuillez indiquer une adresse email.");
        ok = 0;
        document.getElementById('mail').focus();
        return false;
    } else if (reg.test(document.getElementById('mail').value) === false)
    {
        alert("Veuillez saisir une adresse email valide.\nExemple : test@gmail.com");
        ok = 0;
        document.getElementById('mail').focus();
        return false;
    }

    if (document.getElementById('login').value == "")
    {
        alert("Veuillez indiquer votre login.");
        ok = 0;
        document.getElementById('login').focus();
        return false;
    }
    if (document.getElementById('mdp').value == "")
    {
        alert("Veuillez indiquer votre mot de passe.");
        ok = 0;
        document.getElementById('mdp').focus();
        return false;
    }
    if (document.getElementById('mdp').value.length < 7)
    {
        alert("Votre mot de passe doit comporter au moins 7 caractères.");
        ok = 0;
        document.getElementById('mdp').focus();
        return false;
    }
    if (document.getElementById('mdp2').value == "")
    {
        alert("Veuillez retaper votre mot de passe.");
        ok = 0;
        document.getElementById('mdp2').focus();
        return false;
    }
    if ((document.getElementById('mdp').value) != (document.getElementById('mdp2').value))
    {
        alert("Vos mots de passes sont différents.");
        ok = 0;
        document.getElementById('mdp').focus();
        return false;
    }

    if (ok == 1) {

        document.submit();

    }

}