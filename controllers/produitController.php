<?php
if (empty($_GET['action'])) {
    print_view('produits');
    die;
}
switch ($_GET['action']) {
    case 'add':
        if (!empty($_POST['nom-produit']) && !empty($_POST['prix']) && !empty($_POST['tva']) && !empty($_POST['unite-produit'])) {
            create_produit($_POST['nom-produit'], $_POST['description'], intval($_POST['prix']), floatval($_POST['tva']), $_POST['unite-produit']);
            header('Location: /?data=produit&action=list', true, 301);
        } else {
            die('Vous avez pas renseigner tout les champs obligatoire !');
        }
    break;

    case 'edit':
        if(!empty($_POST['produit_name']) && !empty($_POST['produit_description']) && !empty($_POST['produit_prix']) && !empty($_POST['produit_tva']) && !empty($_POST['produit_unite']) && !empty($_POST['cid'])){

            edit_produit($_POST['produit_name'], $_POST['produit_description'], intval($_POST['produit_prix']), floatval($_POST['produit_tva']), $_POST['produit_unite'], $_POST['cid']);
            
            header('Location: /?data=produit&action=view&cid='.$_POST['cid'], true, 301);

        } else {
            die('Vous avez pas renseigner tout les champs obligatoire !');
        }
    break;

    case 'delete':
        if(!empty($_GET['cid'])){
            delete_produit($_GET['cid']);
            header('Location: /?data=produit&action=list', true, 301);
        } else {
            die('L\'identifiant produit est obligatoire');
        }
    break;

    case 'view':
        if(!empty($_GET['cid'])){
            $produit = get_produit($_GET['cid']);
            if(!empty($produit)){
                print_view('produits/single', ['produit' => $produit]);
                die;
            }
        }
        print_view('404');
    break;

    case 'list':
        $produits = get_all_produits();
        print_view('produits/list', ['produits' => $produits]);
    break;

    default:
        print_view('404');
}