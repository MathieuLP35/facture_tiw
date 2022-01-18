<div class="container">
    <div class="row">
        <h1>Modification du produit</h1>
        <form action="?data=produit&action=edit" method="POST">
            <div class="form-group">
                <label for="produit_name">Nom du produit</label>
                <input type="text" class="form-control" name="produit_name" id="produit_name" value="<?= $produit['name']; ?>" required>

                <label for="produit_description">Description du produit</label>
                <input type="text" class="form-control" name="produit_description" id="produit_description" value="<?= $produit['description']; ?>">

                <label for="produit_prix">Prix du produit</label>
                <input type="text" class="form-control" name="produit_prix" id="produit_prix" value="<?= $produit['price']; ?>" required>

                <label for="produit_tva">TVA</label>
                <select name="produit_tva" id="produit_tva" class="form-control" required>
                    <option value="<?= $produit['tva']; ?>"><?= $produit['tva']; ?>%</option>
                    <option value="20">20%</option>
                    <option value="5.5">5.5%</option>
                </select>

                <label for="produit_unite">Unité</label>
                <select name="produit_unite" id="produit_unite" class="form-control" required>
                    <option value="<?= $produit['unite']; ?>"><?= $produit['unite']; ?></option>
                    <option value="prestation">prestation</option>
                    <option value="heure">heure</option>
                    <option value="volume">volume</option>
                    <option value="unite">unite</option>
                </select>
            </div>
            <input type="hidden" name="cid" value="<?= $produit['id']; ?>">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>