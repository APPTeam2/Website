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
        </p>
        <fieldset id="acheter_tickets">
            <legend>Acheter un Ticket</legend>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom"/><br/>
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom"/><br/>
            <label for="date">Choisissez les dates de votre festival : </label>
            <select name="date" id="date_1">
                <option value="date_1">Le date 1</option>
                <option value="date_2">Le date 2</option>
                <option value="date_3">Le date 3</option>
                <option value="date_4">3 jours, du au</option>
            </select>
        </fieldset>
        <input type="submit" value="Valider" onclick="return valider()"></input>
    </div>
</section>
    

