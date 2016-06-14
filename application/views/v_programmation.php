<?php
/** view accueil_section
 * 
 * @author Nathan
 * @date 08/06/2016
 * @version 0.1
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="programmation">
    <article id="animations">
        <h3>Animations :</h3>
        <p>
            Fest esaip vous permettra de décourvrir de moultes et moultes animations pendant
            ses trois jours d'ouverture. La plupart d'entre elles sont listées ci-dessous:
        </p>
        <ul class="liste_animations_stands1">
            <li>● Clown</li>
            <li>● Dinosaures</li>
            <li>● Licornes</li>
            <li>● Un fil rouge</li>
        </ul>
        <ul class="liste_animations_stands2">
            <li>● Clown</li>
            <li>● Dinosaures</li>
            <li>● Licornes</li>
            <li>● Dance de la chenille</li>
            <li>● Un fil rouge</li>
        </ul>
    </article>
    <article id="stands">
        <h3>Stands :</h3>
        <p>
            Vous pourrez de plus allez vous divertir et perdre votre argent dans les nombreux 
            stands qui seront à votre disposition prêts à vous accueillir. Ci-dessous une liste 
            non exhaustive de ces fabuleuses attractions: 
        </p>
        <ul class="liste_animations_stands1">
            <li>● Aqua Poney</li>
            <li>● Pêche au canard</li>
            <li>● Baptême de Tank</li>
            <li>● Barbe à papa</li>
        </ul>
        <ul class="liste_animations_stands2" >
            <li>● Aqua Poney</li>
            <li>● Sucettes de Suzette</li>
            <li>● Pêche au canard</li>
            <li>● Baptême de Tank</li>
            <li>● Barbe à papa</li>
        </ul>
    </article>
    <article id="concerts">
        <h3>Concerts :</h3>
        <p>
            Voici les artistes et horaires programmés pour le prochain festival FestEsaip: 
        </p>
        <ul>
        <?php
        /* On récupère la liste des concerts */
            $length = count($T_concerts);
            for ($i = 0; $i < $length; $i=$i+3)
            {
                echo "<li>● ".$T_concerts[$i]." le ".$T_concerts[$i+1]." à ".$T_concerts[$i+2]."</li>";
            }
        ?>
        </ul>
    </article>

