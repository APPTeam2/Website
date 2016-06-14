<?php
/** Centre de la page pour l'inscription d'un utilisateur
 * 
 * @author Antoine RICHARD
 * @date 07/06/2016
 * @version 0.4
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    <script language="JavaScript" type="text/javascript" src=<?php echo($url_base . '/assets/javascript/fonctionsJavascript.inc.js') ?>></script>
    <script language="JavaScript" type="text/javascript" src=<?php echo($url_base . '/assets/javascript/jquery.js') ?>></script>
    <div id="form">
        <h1>Inscription</h1>
        <form method="post" action="<?php echo($url_base . 'Inscription/validationcreerPersonne') ?>" name="CreateUser">
            <fieldset id="infoForm">
                <legend>Vos informations générales</legend>
                <input type="hidden" readonly="readonly" name="id" id="id"></input>
                <label for="civilite">Civilité :</label>
                <select type="select" name="civilite" id="civilite">
                    <option value="">Sélectionnez une civilité</option>
                    <option value="Madame">Madame</option>
                    <option value="Monsieur">Monsieur</option>
                </select>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom"></input><br/>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom"></input><br/>
                <label for="text">E-Mail :</label>
                <input type="email" name="mail" id="mail"></input><br/>
            </fieldset>

            <!-- Donnée de connexion des utilisateur -->
            <fieldset id="infoForm">
                <legend>Vos identifiants de connexion</legend>
                <label for="login">Login :</label>
                <input type="text" name="login" id="login"></input><br/>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" oncopy="return false;" oncut="return false;"></input><br/>
                <label for="mdp2">Retaper le mot de passe :</label>  <!-- vérification de mots de passe -->
                <input type="password" name="mdp2" id="mdp2" oncopy="return false;" oncut="return false;"></input><br/>
            </fieldset>

            <input type="submit" value="Valider" onclick="return valider()"></input>
            <!-- OnClick exécutera le JS qui testera tout les champ du formulaire. -->
        </form>
    </div>
    <?php
// message de validation de création ou non 
    if (isset($this->message)) {
        echo "<strong>" . $this->message . "</strong>";
    }
    ?>
</section>