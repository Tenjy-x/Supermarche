<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caisse Supermarché</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #2d3436 0%, #000000 100%) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            padding: 15px 0;
        }

        .navbar-custom .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff !important;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .navbar-custom .navbar-brand i {
            color: #fdcb6e;
            margin-right: 10px;
        }

        .navbar-custom .nav-text {
            color: #fff !important;
            font-weight: 500;
            padding: 8px 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .navbar-custom .nav-text i {
            color: #fdcb6e;
            margin-right: 8px;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #e74c3c;
            border-color: #e74c3c;
            transform: scale(1.05);
            color: #fff;
        }

        .main-container {
            padding: 30px 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            padding: 20px 25px;
            font-weight: 600;
            border: none;
        }

        .card-header i {
            margin-right: 10px;
        }

        .card-body {
            padding: 25px;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-primary-custom {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: #fff;
        }

        .btn-success-custom {
            background: linear-gradient(90deg, #00b894 0%, #00cec9 100%);
            color: #fff;
        }

        .btn-warning-custom {
            background: linear-gradient(90deg, #fdcb6e 0%, #f39c12 100%);
            color: #fff;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background: linear-gradient(90deg, #2d3436 0%, #000000 100%);
            color: #fff;
        }

        .table thead th {
            padding: 15px;
            font-weight: 600;
            border: none;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table tfoot {
            background: #f8f9fa;
            font-weight: 700;
        }

        .table tfoot td {
            padding: 15px;
            font-size: 1.1rem;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: #2d3436;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .total-amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e74c3c;
        }

        .badge-caisse {
            background: linear-gradient(90deg, #fdcb6e 0%, #f39c12 100%);
            color: #2d3436;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-custom .navbar-brand {
                font-size: 1.2rem;
            }
            
            .main-container {
                padding: 15px 0;
            }
            
            .card {
                margin-bottom: 20px;
            }
            
            .table-responsive {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-store"></i> Caisse Supermarché
            </a>
            
            <?php if (isset($logged_in) && $logged_in): ?>
                <div class="d-flex align-items-center">
                    <?php if (isset($caisse_numero)): ?>
                        <span class="nav-text me-3">
                            <i class="fas fa-cash-register"></i> 
                            <?= $caisse_numero ?>
                        </span>
                    <?php endif; ?>
                    <a href="<?= base_url('/logout') ?>" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container main-container">