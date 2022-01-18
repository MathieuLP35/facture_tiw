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
                    <th scope="col">Prix (HT)</th>
                    <th scope="col">TVA</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix (TTC)</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $call_facture = call_facture_info($facture['id']);
                $total = 0;
                foreach($call_facture AS $cf):
                    $total = $total + $cf['productTTC'];
            ?>
                <tr>
                    <td><?= $cf['productName']; ?></td>
                    <td><?= $cf['productPrice']; ?> €</td>
                    <td><?= $cf['productTVA']; ?> %</td>
                    <td><?= $cf['productNumber'].' '.$cf['productUnite'] ?></td>
                    <td><?= $cf['productTTC']; ?> €</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Total: <?= $total; ?> €</h2>
    </div>
</div>
