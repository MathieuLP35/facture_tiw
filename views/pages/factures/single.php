<div class="container">
    <div class="row">
        <h1>Modification de la facture</h1>
        <form action="?data=facture&action=edit" method="POST">
            <div class="form-group">
                <label for="facture-name">Nom de la facture</label>
                <input type="text" class="form-control" name="facture-name" id="facture-name" value="<?= $facture['name']; ?>" required>
            </div>

            <label for="client-facture">Client</label>
            <select name="client-facture" id="client-facture" class="form-control" required>
                <option selected>Sélectionner le client à facturé</option>
                <?php foreach($clients AS $client): ?>
                    <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                <?php endforeach; ?>
            </select>

            <input type="hidden" name="fid" value="<?= $facture['id']; ?>">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>

        <!-- Ajouter des produits à une facture -->
        <h2 class="mt-5">Ajouter un produit à la facture</h2>
        <form action="?data=facture&action=addProd" method="POST">
            <label for="produit-facture">Produit</label>
            <select name="produit-facture" id="produit-facture" class="form-control" required>
                <option selected>Sélectionner le produit à ajouté</option>
                <?php foreach($produits AS $produit): ?>
                    <option value="<?= $produit['id'] ?>"><?= $produit['name'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="qty-produit-facture">Quantité</label>
            <input class="form-control" type="number" min="1" max="100" id="qty-produit-facture" name="qty-produit-facture" placeholder="Quantité" required>

            <input type="hidden" name="fid" value="<?= $facture['id']; ?>">

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Prix unitaire(Hors Taxe)</th>
                    <th scope="col">Nombre d'article</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $call_facture = call_facture_info($facture['id']);
                foreach($call_facture AS $cf):
            ?>
                <tr>
                    <td><?= $cf['productName']; ?></td>
                    <td><?= $cf['productPrice']; ?> euros</td>
                    <td><?= $cf['productNumber']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?= 
            var_dump($call_facture);
        ?>
    </div>
</div>
