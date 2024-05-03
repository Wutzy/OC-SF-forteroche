<?php
    /**
     * Affichage de la partie monitoring : liste des articles avec nombre de vue, nombre de commentaires et
     * date de publication.
     */
?>

<h2>Monitoring</h2>

<div class="adminArticle">
    <table>
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Vues</th>
                <th scope="col">Commentaires</th>
                <th scope="col">Date de publication</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) { ?>
                <tr>
                    <th scope="row"><?= $article->getTitle() ?></th>
                    <td><?= $article->getViews() ?></td>
                    <td><p><?= $comments->getTotalCommentsByArticleId($article->getId()) ?></p></td>
                    <td><?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>