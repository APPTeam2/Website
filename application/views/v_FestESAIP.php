<?php
/** A CHANGER
 * 
 * @author Florian Levenez-Delafontaine
 * @date A 09/06/2016
 * @version 1.2
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<section>
    <div class="FestEsaip">
        <h3 id="historique" class="droit">Historique</h3>
        <p class="anonce"> Retrouvez la liste de nos précédents événements et les artistes qui y étaient présents.</p>

        <table>
            <?php
            /*
             On récupère l'historique des festivals.
             la première ligne etant vide on comence directement à la ligne 2.
             */
            $length = count($T_historique);
            for ($i = 1; $i < $length; $i++) {
                echo "<tr>";
                    echo "<th>";
                        echo $T_historique[$i][0];
                    echo "</th>";
                    echo "<th>";
                        echo "<ul class='espace'>";
                        $length2 = count($T_historique[$i]);
                            for ($j = 1; $j < $length2; $j++) {
                                echo "<li>";
                                echo $T_historique[$i][$j];
                                echo "</li>";
                            }
                        echo "</ul>";
                    echo "</th>";
                echo "</tr>";
            }
            ?>
        </table>





        <!-- backup
        <table>
            <tr>
                <th>
                    <h4>Fest'ESAIP 2048</h4>
                </th>
                <th>
                    <ul class="espace">
                        <li>Daft Punk</li>
                        <li>Fredy Mercurie (holographique)</li>
                        <li>Sun 42</li>
                        <li>Bratisla boy</li>
                        <li>Boby La Pointe (holographique)</li>
                        <li>Edith Piaf (holographique)</li>
                    </ul>
                </th>
            </tr>
            <tr>
                <th>
                    <h4>Fest'ESAIP 2049</h4>
                </th>
                <th>
                    <ul class="espace">
                        <li>Mathias Perraud et ses mignottet</li>
                        <li>Antoine et ses sbires</li>
                        <li>les brute du staff</li>
                        <li>U3</li>
                        <li>Wolfgang Amadeus Mozart (holographique)</li>
                        <li>Edith Piaf (holographique)</li>
                    </ul>
                </th>
            </tr>
            <tr>
                <th>
                    <h4>Fest'ESAIP 2050</h4>
                </th>
                <th>
                    <ul class="espace">
                        <li>a10a</li>
                        <li>Trivial</li>
                        <li>Ca vas chauffer</li>
                        <li>U1 retour aux sources</li>
                        <li><s>Booba</s></li>
                        <li>Edith Piaf (holographique)</li>
                    </ul>
                </th>
            </tr>
        </table>
        -->

    </div>


    <div class="FestEsaip">
        <h3 id="contact">Equipe/contact</h3>
        <br>
        <ul>
            <li class="espace">Chef supreme : Le sous-fifre.</li>
            <li class="espace">Sous chef : Antoine Richard</li>
            <li class="espace">Brute : Nathan Hardi</li>
            <li class="espace">Enfant perdu : Adrien Pironneau</li>
            <li class="espace">Mascotte : Florian Levenez-Delafontaine</li>
            <li class="espace">Sous-fifre : Antoine Guillot</li>
        </ul> 
        <p class="espace">Nous contacter : <a href="mailto:FestESAIP.contact@esaip.org"><br />FestESAIP.contact@esaip.org</a> <br /> <?php echo anchor($uri = $url_base."Contact/formulaire#", $title = 'Formulaire en ligne')?></p>
    </div>
</section>