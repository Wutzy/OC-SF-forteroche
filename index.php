<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.
        case 'home':
            $articleController = new ArticleController();
            $articleController->showHome();
            break;

        case 'apropos':
            $articleController = new ArticleController();
            $articleController->showApropos();
            break;

        case 'showArticle':
            $articleController = new ArticleController();
            $articleController->showArticle();
            break;

        case 'addArticle':
            $articleController = new ArticleController();
            $articleController->addArticle();
            break;

        case 'addComment':
            $commentController = new CommentController();
            $commentController->addComment();
            break;

        // Section admin & connexion.
        case 'admin':
            $adminController = new AdminController();
            $adminController->showAdmin();
            break;

        case 'monitoring' :
            $adminController = new AdminController();
            $adminController->showMonitoring();
            break;
        
        case 'monitoringSorted' :
            $adminController = new AdminController();

            // Création d'un tableau de valeurs acceptées
            $allowed_columns = ['title', 'views', 'comments', 'date_creation'];
            $allowed_order = ['ASC', 'DESC'];

            // Récupération de la valeur de column & order
            $column = Utils::request('column');
            $order = Utils::request('order');

            // Vérification des valeurs fournies dans le get en les comparant avec les valeurs autorisées
            if (in_array($column, $allowed_columns) && in_array($order, $allowed_order))
            {
                $adminController->showMonitoring($column, $order);
            }
            else {
                die('Bye World');
            }           
            break;
                  
        case 'connectionForm':
            $adminController = new AdminController();
            $adminController->displayConnectionForm();
            break;

        case 'connectUser':
            $adminController = new AdminController();
            $adminController->connectUser();
            break;

        case 'disconnectUser':
            $adminController = new AdminController();
            $adminController->disconnectUser();
            break;

        case 'showUpdateArticleForm':
            $adminController = new AdminController();
            $adminController->showUpdateArticleForm();
            break;

        case 'updateArticle':
            $adminController = new AdminController();
            $adminController->updateArticle();
            break;

        case 'deleteArticle':
            $adminController = new AdminController();
            $adminController->deleteArticle();
            break;
        
        case 'deleteComment':
            $adminController = new AdminController();
            $adminController->deleteComment();
            break;
        
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}