<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-lock"></i> Connexion
                </h5>
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> <?= $error ?>
                    </div>
                <?php endif; ?>
                
                <form action="<?= base_url('/login') ?>" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">
                            <i class="fas fa-user"></i> Nom d'utilisateur
                        </label>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Entrez votre nom d'utilisateur" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">
                            <i class="fas fa-key"></i> Mot de passe
                        </label>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Entrez votre mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom w-100">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>
                </form>
                
                <div class="mt-3 text-center text-muted small">
                    <i class="fas fa-info-circle"></i> Utilisateur: admin / Mot de passe: admin123
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>