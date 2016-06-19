<?php
/** view accueil_section
 * 
 * @author Nathan
 * @date 15/06/2016
 * @version 0.1
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
    <div id="tickets">
        <h3>Achetez Votre Ticket Pour le Fest Esaip</h3>
        <p>Ici vous pouvez acheter votre ticket pour 1 jour, 2 jours (necessité
        d'acheter deux ticket d'un jour) ou prendre la formule Full, 3 en 1, Méga
        Giga, Tera, Supra Festival pour les trois jours consécutifs.
        <br/>Veuillez renseigner les champs ci-dessous et le billet que vous avez choisi
        vous sera envoyé sur votre boite mail correspondant à  l'adresse que vous avez renseigné
        lors de votre inscription.
        </p>

        <form id="tickets2" method="post" action="<?php echo($url_base.'Inscription_Ticket/valider_ticket')?>">
            <fieldset id="acheter_tickets">
                <legend>Acheter un Ticket</legend>
                <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom" class="champ"/ required>
                <br/>
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom" class="champ"/ required >
                <br/>
                <label for="date">Choisissez les dates de votre festival : </label>
                <br />
                <select name="date" id="date_1" >
                    <option value="date_1">Jour 1</option>
                    <option value="date_2">Jour 2</option>
                    <option value="date_3">Jour 3</option>
                    <option value="date_4">3 jours</option>
                </select>
                <input type="submit" value="Valider" />
            </fieldset>
        </form>
    </div>
</section>


