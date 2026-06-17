<?php include 'header.php'; ?>

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
                        <select class="form-select" id="produit_id" name="produit_id" required>
                            <option value="">-- Choisir un produit --</option>
                            <?php foreach ($produits as $produit): ?>
                                <option value="<?= $produit['id'] ?>">
                                    <?= $produit['designation'] ?> 
                                    - <?= number_format($produit['prix'], 0, ',', ' ') ?> Ar
                                    <span class="badge bg-secondary">Stock: <?= $produit['quantite_stock'] ?></span>
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

    <!-- Liste des achats -->
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">
                    <i class="fas fa-receipt"></i> Détails de l'Achat
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="fas fa-box"></i> Produit</th>
                                <th class="text-end"><i class="fas fa-tag"></i> Prix Unit</th>
                                <th class="text-center"><i class="fas fa-sort-numeric-up"></i> Qté</th>
                                <th class="text-end"><i class="fas fa-money-bill-wave"></i> Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($achats)): ?>
                                <?php foreach ($achats as $achat): ?>
                                    <tr>
                                        <td>
                                            <strong><?= $achat['designation'] ?></strong>
                                        </td>
                                        <td class="text-end">
                                            <?= number_format($achat['prix'], 0, ',', ' ') ?>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-primary"><?= $achat['quantite'] ?></span>
                                        </td>
                                        <td class="text-end fw-bold">
                                            <?= number_format($achat['montant'], 0, ',', ' ') ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        <i class="fas fa-shopping-basket fa-2x d-block mb-2"></i>
                                        Aucun achat en cours
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end">
                                    <strong><i class="fas fa-calculator"></i> Total</strong>
                                </td>
                                <td class="text-end total-amount">
                                    <?= number_format($total, 0, ',', ' ') ?> Ar
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <?php if (!empty($achats)): ?>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i>
                        <strong>Total des achats:</strong> 
                        <span class="total-amount"><?= number_format($total, 0, ',', ' ') ?> Ar</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>