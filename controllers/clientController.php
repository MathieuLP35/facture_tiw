<?php
if (empty($_GET['action'])) {
    print_view('clients');
    die;
}
switch ($_GET['action']) {
    case 'add':
        if (!empty($_POST['nom-client'])) {
            create_client($_POST['nom-client']);
            header('Location: /?data=client&action=list', true, 301);
        } else {
            die('Le nom client est obligatoire !');
        }
    break;

    case 'edit':
        if(!empty($_POST['client_name']) && !empty($_POST['cid'])){
            edit_client($_POST['client_name'], $_POST['cid']);
            header('Location: /?data=client&action=view&cid='.$_POST['cid'], true, 301);
        } else {
            die('Le nom client et l\'identifiant client sont obligatoires');
        }
    break;

    case 'delete':
        if(!empty($_GET['cid'])){
            delete_client($_GET['cid']);
            header('Location: /?data=client&action=list', true, 301);
        } else {
            die('L\'identifiant client est obligatoire');
        }
    break;

    case 'view':
        if(!empty($_GET['cid'])){
            $client = get_client($_GET['cid']);
            $factures = get_facture_client($_GET['cid']);
            if(!empty($client)){
                print_view('clients/single', ['client' => $client, 'factures' => $factures]);
                die;
            }
        }
        print_view('404');
    break;

    case 'list':
        $clients = get_all_clients();
        print_view('clients/list', ['clients' => $clients]);
    break;

    default:
        print_view('404');
}