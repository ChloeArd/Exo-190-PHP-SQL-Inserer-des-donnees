<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */
$server = "localhost";
$db = "table_test_php";
$user = "root";
$password = "";


try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    $sql1 = "
        INSERT INTO utilisateur VALUES (NULL, 'Ardoise', 'Chloé', 'chloe.ardoise@gmail.com', 'manger123', '4 BIS ruelle vitou, Anor', 59186, 'France', NOW())
    ";

    $result = $pdo->exec($sql1);


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    $sql2 = "
        INSERT INTO produit VALUES (NULL, 'Tablette Milka', 2.99, 'Une tablette de chocolat au lait de la marque Milka', 'Sucre, graisse de palme, lait écrémé en poudre, beurre de cacao, lactosérum en poudre (de lait), pâte de cacao, beurre concentré, émulsifiants (lécithine de soja, lécithine de tournesol), pâte de noisettes, arôme. 7% de lait écrémé en poudre dans le fourrage crème confiseur de lait. Peut contenir autres fruits à coque et blé.')
    ";

    $result = $pdo->exec($sql2);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    $sql3 = "
        INSERT INTO utilisateur 
        VALUES (NULL, 'Parker', 'Peter', 'peter.parker@gmail.com', 'spiderMan000', '738 Winter Garden DriveForest Hills, Queens, New York.', 530214, 'USA', NOW()),
               (NULL, 'Maximoff', 'Wanda', 'wanda.maximoff@gmail.com', 'wandavision1789', '2015 marvel states, New York', 14820, 'USA', NOW() )
    ";

    $result = $pdo->exec($sql3);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $sql4 = "
        INSERT INTO produit
        VALUES (NULL, 'Triple cheese burger', 2.45, 'Hamburger Mcdo', 'Hamburger avec 3 fromages et 3 steak'),
               (NULL, '6 nuggets', 2.89, 'Nuggets Mcdo', '6 nuggets de poulet ')                 
        ";

    $result = $pdo->exec($sql4);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    $pdo->beginTransaction();
    $insert1 = "INSERT INTO utilisateur VALUES ";

    $sql5 = $insert1."('Blanco', 'Gilbert', 'gilbert.blanco@gmail.com', 'mdp123456', '2 rue des paradis, fourmies', 59610, 'France', NOW())";
    $pdo->exec($sql5);

    $sql6 = $insert1."('Fraise', 'Nadia', 'nadida.fraise@gmail.com', 'fraise753159', '19 rue des fraises, fruits', 86120, 'France', NOW())";
    $pdo->exec($sql6);

    $sql7 = $insert1."('Blanco', 'Gilbert', 'gilbert.blanco@gmail.com', 'mdp123456', '2 rue des paradis, fourmies', 59610, 'France', NOW())";
    $pdo->exec($sql7);

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    $pdo->beginTransaction();
    $insert2 = "INSERT INTO produit VALUES";

    $sql8 = "('M&Ms', 3.05, 'des bonbons en chocolat avec noisette', 'efbfuiepjfpezfjpefjepffjefjifbazznsalsnalssaskpâ')";
    $pdo->exec($sql8);

    $sql9 = "('Tagada', 2.12, 'des bonbons à la fraise', 'efbfuiepfveqgrgerfrejfpezfjpefjepffjefjifbazznsalsnalssaskpâ')";
    $pdo->exec($sql9);

    $sql10 = "('Fondant au chocolat', 3.54, 'Gâteau au chocolat avec un coeur fondant', 'efbfuiepjfpezfjpefjepffjefjifbazznsalsrfrfregtrhtrhehtynalssaskpâ')";
    $pdo->exec($sql10);

}
catch (PDOException $e) {
    echo "Une erreur est survenue: ".$e->getMessage()."<br>";
    $pdo->rollBack();
}