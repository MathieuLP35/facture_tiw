<div class="container">
    <div class="row">
        <h1 class="col-sm-12 text-center">Application de factures</h1>
        <form action="?data=produit&action=add" class="col-sm-10 col-md-8 align-selft-center" method="POST">
            <h2>Ajouter un produit</h2>
            <div class="form-group">
                <label for="nom-produit">Nom du produit</label>
                <input type="text" id="nom-produit" name="nom-produit" placeholder="nom du produit" class="form-control" required>

                <label for="description">Description du produit (optionnel)</label>
                <input type="text" id="description" name="description" placeholder="description du produit" class="form-control">

                <label for="prix">Prix du produit</label>
                <input type="text" id="prix" name="prix" placeholder="prix du produit" class="form-control" required>

                <label for="tva">TVA applicable</label>
                <select name="tva" id="tva" class="form-control" required>
                    <option value="20">20 %</option>
                    <option value="5.5">5.5 %</option>
                </select>

                <label for="unite-produit">Unité</label>
                <select name="unite-produit" id="unite-produit" class="form-control" required>
                    <option selected>Sélectionner l'unité</option>
                    <option value="unité">Unitaire</option>
                    <option value="h">Heure</option>
                    <option value="m²">Volume</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-2">Ajouter</button>
        </form>

        <!-- afficher les clients dans un tableau -->
        <!-- 2 colonnes: nom client -> bouton supprimer -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Unité</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($produits AS $produit):
            ?>
                <tr>
                    <td><?= $produit['name']; ?></td>
                    <td><?= $produit['description']; ?></td>
                    <td><?= $produit['price']; ?></td>
                    <td><?= $produit['unite']; ?></td>
                    <td>
                        <a href="?data=produit&action=view&cid=<?= $produit['id']; ?>" class="btn btn-warning">Voir</a>
                        <a href="?data=produit&action=delete&cid=<?= $produit['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>