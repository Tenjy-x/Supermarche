<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="fas fa-cash-register"></i> Choisir la Caisse
                </h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/caisse/selectionner') ?>" method="post">
                    <div class="mb-4">
                        <label for="caisse_id" class="form-label">
                            <i class="fas fa-store-alt"></i> Sélectionnez une caisse
                        </label>
                        <select name="caisse" class="form-select form-select-lg" id="caisse_id" name="caisse_id" required>
                            <option value="">-- Choisir une caisse --</option>
                            <?php foreach ($caisses as $caisse): ?>
                                <option value="<?= $caisse['id']?>">
                                    <i class="fas fa-cash-register"></i> <?= $caisse['numero_caisse'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-custom w-100">
                        <i class="fas fa-check-circle"></i> Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>