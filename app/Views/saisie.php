<?php include 'header.php'; ?>
<div class="header">
    <?php echo $caisse['numero_caisse'];?>
</div>
<div class="row">
    <!-- Formulaire de saisie -->
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    <i class="fas fa-shopping-cart"></i> Saisie des Achats
                </h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/achat/ajouter') ?>" method="post">
                    <div class="mb-3">
                        <label for="produit_id" class="form-label">
                            <i class="fas fa-box"></i> Produit
                        </label>
                        <select name = "produit" class="form-select" id="produit_id" name="produit_id" required>
                            <option value="">-- Choisir un produit --</option>
                            <?php foreach ($produits as $produit): ?>
                                <option value="<?= $produit['id'] ?>">
                                    <?= $produit['Nom'] ?> 
                                    - <?= number_format($produit['Prix'], 0, ',', ' ') ?> Ar
                                    <span class="badge bg-secondary">Stock: <?= $produit['Quantite_en_stock'] ?></span>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="quantite" class="form-label">
                            <i class="fas fa-sort-numeric-up"></i> Quantité
                        </label>
                        <input type="number" class="form-control" id="quantite" name="quantite" 
                               min="1" placeholder="Entrez la quantité" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom w-100">
                        <i class="fas fa-plus-circle"></i> Ajouter à l'achat
                    </button>
                </form>
                
                <?php if (!empty($achats)): ?>
                    <hr>
                    <form action="<?= base_url('/achat/cloturer') ?>" method="post">
                        <button type="submit" class="btn btn-success btn-custom w-100">
                            <i class="fas fa-check-double"></i> Clôturer l'Achat
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>