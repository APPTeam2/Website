<?php
/** Centre de la page pour l'inscription d'un utilisateur
 * 
 * @author Antoine RICHARD
 * @date 19/06/2016
 * @version 1
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/** Cette page s'affiche lors de la réussite de la création d'une personne
 * 
 * récupération des données de l'utilisateur créé
 */
$civilite = $_POST['civilite'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$login = $_POST['login'];
?>
<section>
    <div id="form">
        <h1>L'utilisateur a bien été créé</h1>

        <fieldset id='infoForm'>
            <legend>Ses informations</legend>
            <label for="civilite">Civilité :</label>
            <input type="text" readonly="readonly" name="civilite" id="civilite" value="<?php echo $civilite ?>"></input><br/>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" readonly="readonly" value="<?php echo $nom ?>"></input><br/>
            <label for="prenom">Prénom :</label>
            <input type="prenom" name="prenom" id="mdp" readonly="readonly" value="<?php echo $prenom ?>"></input><br/>
            <label for="mail">E-Mail :</label>
            <input type="text" name="mail" id="mail" readonly="readonly" value="<?php echo $mail ?>"></input><br/>
        </fieldset>

        <fieldset id='infoForm'>
            <legend>Identifiant de connexion</legend>
            <label for="login">Login :</label>
            <input type="text" readonly="readonly" name="login" id="login" value="<?php echo $login ?>"></input><br/>
        </fieldset>

        <input type="button" value="Retour à la page d'Accueil" onclick="window.location.href = '<?php echo($url_base) ?>';">
    </div>
</section>