<?php
    /**
     * Affichage de la partie monitoring : liste des articles avec nombre de vue, nombre de commentaires et
     * date de publication.
     */
?>

<h2>Monitoring</h2>

<div>
    <table>
        <thead>
            <tr>
                <?php foreach (ArticleManager::COLUMNS as $filterColumn => $filterOrder):
                echo '<th scope="col">';
                //var_dump($order, $filterOrder);
                    if ($order != $filterOrder)
                    {   
                        echo '<a href="index.php?action=monitoringSorted&column=' . $filterColumn .'&order=' . $filterOrder . '">' . $filterColumn . '</a>'; 
                    }                           
                    else {
                        echo '<a href="index.php?action=monitoringSorted&column=' . $filterColumn .'&order=DESC">' . $filterColumn . '</a>'; 
                    }
                    
                echo '</th>';
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