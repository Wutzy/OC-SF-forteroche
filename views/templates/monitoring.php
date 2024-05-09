<?php
    /**
     * Affichage de la partie monitoring : liste des articles avec nombre de vue, nombre de commentaires et
     * date de publication.
     */
?>

<h2>Monitoring</h2>

<div class="">
    <table>
        <thead>
            <tr>
                <?php foreach (ArticleManager::COLUMNS as $filterColumn => $filterOrder):
                if ($column != $filterColumn && $order != $filterOrder):
                    echo
                        '<th scope="col"><a href="index.php?action=monitoring&column=' . $filterColumn .'&order=' . $filterOrder . '">Titre</a></th>
                        <th scope="col"><a href="index.php?action=monitoring">Vues</a></th>
                        <th scope="col"><a href="index.php?action=monitoring">Commentaires</a></th>
                        <th scope="col"><a href="index.php?action=monitoring">Date de publication</a></th>';
                endif;
                endforeach; ?>

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