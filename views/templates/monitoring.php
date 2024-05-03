<?php
    /**
     * Affichage de la partie monitoring : liste des articles avec nombre de vue, nombre de commentaires et
     * date de publication.
     */
?>

<h2>Monitoring</h2>
<?php
$url = '';
if (!str_ends_with(($_GET['action']), 'Desc')) {
    $url = 'Desc';
} 

?>

<div class="">
    <table>
        <thead>
            <tr>    
                <th scope="col"><a href="index.php?action=monitoringByTitle<?php echo $url ?>">Titre</a></th>
                <th scope="col"><a href="index.php?action=monitoringSortByViews<?php echo $url ?>">Vues</a></th>
                <th scope="col"><a href="index.php?action=monitoringSortByComment<?php echo $url ?>">Commentaires</a></th>
                <th scope="col"><a href="index.php?action=monitoringSortByDate<?php echo $url ?>">Date de publication</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) { ?>
                <tr>
                    <th scope="row"><?= $article->getTitle() ?></th>
                    <td><?= $article->getViews() ?></td>
                    <td><p></p></td>
                    <td><?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>