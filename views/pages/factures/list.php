<div class="container">
    <div class="row">
        <h1 class="col-sm-12 text-center">Application de factures</h1>
        <form action="?data=facture&action=add" class="col-sm-10 col-md-8 align-selft-center" method="POST">
            <h2>Créer une facture</h2>
            <div class="form-group">
                <label for="nom-facture">Nom de la facture</label>
                <input type="text" id="nom-facture" name="nom-facture" placeholder="Nom de la facture" class="form-control" required>

                <label for="client-facture">Unité</label>
                <select name="client-facture" id="client-facture" class="form-control" required>
                    <option selected>Sélectionner le client à facturé</option>
                    <?php foreach($clients AS $client): ?>
                        <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-2">Ajouter</button>
        </form>

        <!-- afficher les clients dans un tableau -->
        <!-- 2 colonnes: nom client -> bouton supprimer -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom de la facture</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($factures AS $facture):
            ?>
                <tr>
                    <td><?= $facture['name']; ?></td>
                    <td>
                        <a href="?data=facture&action=view&fid=<?= $facture['id']; ?>" class="btn btn-warning">Voir</a>
                        <a href="?data=facture&action=delete&fid=<?= $facture['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>