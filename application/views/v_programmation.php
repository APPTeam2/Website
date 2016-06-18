<?php
/** view accueil_section
 * 
 * @author Nathan
 * @date 08/06/2016
 * @version 0.1
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="v_progra">
    <article id="animations">
        <h3 class="h3_programmation">Animations :</h3>
        <p>
            Durant votre séjour de trois jours à Fest esaip, vous pourrez décourvrir moultes et
            moultes animations afin de vous divertir. La plupart de ces fabuleuses activités sont
            sont listées ci-dessous :
        </p>
        <div>
            <ul class="liste_animations_stands_concerts">
                <li>● Cirque</li>
                <li>● Dinosaures en Réalité Virtuelle</li>
                <li>● Licornes 3D</li>
                <li>● Dance de la chenille</li>
                <li>● Un fil rouge</li>
            </ul>
            <ul class="liste_animations_stands_concerts">
                <li>● Feux d'Artifices</li>
                <li>● Dinosaures</li>
                <li>● Licornes</li>
                <li>● Développement Web</li>
                <li>● Un cailloux</li>
            </ul>
        </div>
    </article>
    <article id="stands">
        <h3 class="h3_programmation">Stands :</h3>
        <p>
            Vous pourrez de plus allez vous divertir et perdre votre argent dans les nombreux 
            stands qui seront à votre disposition prêts à vous accueillir. Ci-dessous une liste 
            non exhaustive de ces fabuleuses attractions : 
        </p>
        <div>
            <ul class="liste_animations_stands_concerts">
                <li>● Aqua Poney</li>
                <li>● Sucettes de Suzette</li>
                <li>● Pêche aux canards</li>
                <li>● Management</li>
                <li>● Barbe à papa</li>
            </ul>
            <ul class="liste_animations_stands_concerts">
                <li>● Pétanque</li>
                <li>● Bowling</li>
                <li>● CCNA</li>
                <li>● Baptême de Tank</li>
                <li>● Linux</li>
            </ul>
        </div>
    </article>
    <article id="concerts">
        <h3 class="h3_programmation">Concerts :</h3>
        <p>
            Voici les artistes et horaires programmés pour le prochain festival FestEsaip : 
        </p>
        <div>
            <table id="tab_concerts">
                <thead>
                    <tr>
                        <td class="thead_concerts">Artistes</td>
                        <td class="thead_concerts">Date Concert</td>
                        <td class="thead_concerts">Heure Concert</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    /* On récupère la liste des concerts */
                    $length = count($T_concerts);
                    for ($i = 0; $i < $length; $i = $i + 4)
                    {
                        echo "<tr><td>" . $T_concerts[$i] . "</td><td>" . $T_concerts[$i + 1] . $T_concerts[$i + 2] . "</td><td>" . $T_concerts[$i + 3] . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </article>

