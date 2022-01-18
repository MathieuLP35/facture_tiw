<div class="container">
    <div class="row">
        <h1 class="col-sm-12 text-center">Application de factures</h1>
        <form action="?data=client&action=add" class="col-sm-10 col-md-8 align-selft-center" method="POST">
            <h2>Ajouter un client</h2>
            <div class="form-group">
                <label for="nom-client">Nom du client</label>
                <input type="text" id="nom-client" name="nom-client" placeholder="nom du client" class="form-control"  required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>

        <!-- afficher les clients dans un tableau -->
        <!-- 2 colonnes: nom client -> bouton supprimer -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom du client</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $clients = get_all_clients();
                foreach($clients AS $client):
            ?>
                <tr>
                    <td><?= $client['name']; ?></td>
                    <td>
                        <a href="?data=client&action=view&cid=<?= $client['id']; ?>" class="btn btn-warning">Voir</a>
                        <a href="?data=client&action=delete&cid=<?= $client['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>