<?php
/** Centre de la page pour l'inscription d'un utilisateur
 * 
 * @author Antoine RICHARD
 * @date 16/06/2016
 * @version 0.4
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    <div id="form">
        <h1>Inscription</h1>
        <form method="post" action="<?php echo($url_base . 'Inscription/validationcreerPersonne') ?>" name="CreateUser">
            <fieldset id="infoForm">
                <legend>Vos informations générales</legend>
                <input type="hidden" readonly="readonly" name="id" id="id"></input>
                <label for="civilite">Civilité :</label>
                <select type="select" name="civilite" id="civilite" required>
                    <option value="">Sélectionnez une civilité</option>
                    <option value="Madame">Madame</option>
                    <option value="Monsieur">Monsieur</option>
                </select>
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required></input><br/>
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" required></input><br/>
                <label for="text">E-Mail :</label>
                <input type="email" name="mail" id="mail" placeholder="Entrez votre mail" required></input><br/>
            </fieldset>

            <!-- Données de connexion des utilisateurs -->
            <fieldset id="infoForm">
                <legend>Vos identifiants de connexion</legend>
                <label for="login">Login :</label>
                <input type="text" name="login" id="login" placeholder="Entrez un login " required></input><br/>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" oncopy="return false;" oncut="return false;" placeholder="Entrez mot de passe " required></input><br/>
                <label for="mdp2">Retaper le mot de passe :</label>  <!-- vérification de mots de passe -->
                <input type="password" name="mdp2" id="mdp2" oncopy="return false;" oncut="return false;" placeholder="Entrez le à nouveau " required></input><br/>
            </fieldset>

            <input type="submit" value="Valider"></input>
        </form>
    </div>
</section>