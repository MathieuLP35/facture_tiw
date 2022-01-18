<div class="container">
    <div class="row">
        <h1>Modification du client</h1>
        <form action="?data=client&action=edit" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="client_name" id="client_name" value="<?= $client['name']; ?>" required>
            </div>
            <input type="hidden" name="cid" value="<?= $client['id']; ?>">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
        <!-- afficher les factures d'un dans un tableau -->
        <!-- 1 colonnes: nom factures -> bouton supprimer -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom du client</th>
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
                        <a href="?data=facture&action=view&fid=<?= $facture['id']; ?>&cid=<?= $client['id']; ?>" class="btn btn-warning">Voir</a>
                        <a href="?data=facture&action=delete&fid=<?= $facture['id']; ?>&cid=<?= $client['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>  