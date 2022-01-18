<?php
if (empty($_GET['action'])) {
    print_view('factures');
    die;
}
switch ($_GET['action']) {
    case 'add':
        if (!empty($_POST['nom-facture']) && !empty($_POST['client-facture'])) {
            create_facture($_POST['nom-facture'], $_POST['client-facture']);
            header('Location: /?data=facture&action=list', true, 301);
        } else {
            die('Vous avez pas renseigner tout les champs obligatoire !');
        }
    break;

    case 'edit':
        if(!empty($_POST['facture-name']) && !empty($_POST['client-facture']) && !empty($_POST['fid'])){


            edit_facture($_POST['facture-name'], $_POST['client-facture'], $_POST['fid']);
            
            header('Location: /?data=facture&action=view&fid='.$_POST['fid'], true, 301);

        } else {
            die('Vous avez pas renseigner tout les champs obligatoire !');
        }
    break;

    case 'delete':
        if(!empty($_GET['fid'])){
            delete_facture($_GET['fid']);
            if(empty($_GET['cid'])) {
                header('Location: /?data=facture&action=list', true, 301);
            } else{
                header('Location: /?data=client&action=view&cid='.$_GET['cid'], true, 301);
            }
        } else {
            die('L\'identifiant produit est obligatoire');
        }
    break;

    case 'view':
        if(!empty($_GET['fid'])){
            $clients = get_all_clients();
            $produits = get_all_produits();
            $facture = get_facture($_GET['fid']);
            if(!empty($facture)){
                print_view('factures/single', ['facture' => $facture, 'clients' => $clients, 'produits' => $produits]);
                die;
            }
        }
        print_view('404');
    break;

    case 'list':
        $factures = get_all_factures();
        $clients = get_all_clients();
        print_view('factures/list', ['factures' => $factures, 'clients' => $clients]);
    break;

    // Ajouter un produit d'une facture
    case 'addProd':
        if (!empty($_POST['fid']) && !empty($_POST['produit-facture']) && !empty($_POST['qty-produit-facture'])) {
            addProduct_facture(intval($_POST['fid']), intval($_POST['produit-facture']), floatval($_POST['qty-produit-facture']));
            header('Location: /?data=facture&action=list', true, 301);
        } else {
            die('Vous avez pas renseigner tout les champs obligatoire !');
        }
    break;

    // Supprimer un produits d'une facture
    case 'deleteProd':
        if(!empty($_GET['id']) & !empty($_GET['fid'])){
            deleteProduct_facture(intval($_GET['id']), intval($_GET['fid']));
            header('Location: /?data=facture&action=view&fid='.$_GET['fid'], true, 301);
        } else {
            die('L\'identifiant produit est obligatoire');
        }
    break;

    default:
        print_view('404');
}