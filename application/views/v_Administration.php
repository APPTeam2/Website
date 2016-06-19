<?php
/*
 * @author Florian Levenez-Delafontaine
 * @date A 14/06/2016
 * @version 0.1
 */
?>


<!DOCTYPE html>
<!-- commentaire -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?php echo($url_base . '/assets/css/style_admin.css') ?>"/>
        <title>Fest'Eaip</title>
    </head>

    <body>

        <div>
            <h3>Liste des utilisateurs inscrits sur le site.</h3>

            <table>
                <tr>
                    <th>Login</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                </tr>

                <?php
                foreach ($T_users as $row) {
                    echo "<tr>";
                    echo "<th>$row->login</th>";
                    echo "<th>$row->nomUser</th>";
                    echo "<th>$row->prenomUser</th>";
                    echo "<th>$row->mail</th>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <div>
            <h3>Artiste</h3>

            <table>
                <tr>
                    <th>ID</th>
                    <th>artiste</th>
                </tr>
                <?php
                foreach ($T_artiste as $row) {
                    echo "<tr>";
                    echo "<th>$row->idArtiste</th>";
                    echo "<th>$row->nomArtiste</th>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>


        <div>
            <h3>Reservation</h3>
            
            <table>
                <tr>
                    <th>Festival</th>
                    <th colspan="2">Titulaire</th>
                    <th colspan="3">Comanditaire</th>
                </tr>
                <?php
                foreach ($T_reservation as $row) {
                    echo "<tr>";
                    echo "<th>$row->theme</th>";
                    echo "<th>$row->nomTitulaire</th>";
                    echo "<th>$row->prenomTitulaire</th>";
                    echo "<th>$row->nomUser</th>";
                    echo "<th>$row->prenomUser</th>";
                    echo "<th>$row->mail</th>";
                    echo "</tr>";
                }
                ?>
        </div>
        </div>
    </body>
</html>