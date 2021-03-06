<?php 
include 'inc/view.php';
include 'inc/bdd.php';

if (empty($_GET)) {
    print_view('home');
} else {
    if (empty($_GET['data']) && empty($_GET['action'])) {
        print_view('404');
        die;
    }

    switch ($_GET['data']) {
        case 'client':
            include 'controllers/clientController.php';
        break;
        case 'produit':
            include 'controllers/produitController.php';
        break;
        case 'facture':
            include 'controllers/factureController.php';
        break;
        default :
            print_view('404');
    }
}