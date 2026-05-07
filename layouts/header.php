<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSpot - Platform Blog Pribadi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #e74c3c;
            --secondary-color: #c0392b;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --accent-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark-color);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: var(--dark-color) !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            padding: 1rem 0;
            border-bottom: 4px solid var(--primary-color);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .nav-link {
            color: #ecf0f1 !important;
            margin: 0 0.75rem;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            background: white;
            border-left: 5px solid var(--accent-color);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 15px 15px 0 0;
            font-weight: 600;
            padding: 1.5rem;
        }

        /* Buttons */
        .btn {
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            padding: 0.6rem 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.4);
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background-color: #229954;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.4);
        }

        .btn-warning {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(243, 156, 18, 0.4);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.4);
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            transform: translateY(-3px);
        }

        /* Tables */
        .table {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }

        .table thead {
            background: linear-gradient(135deg, var(--dark-color), #34495e);
            color: white;
        }

        .table thead th {
            border: none;
            padding: 1rem;
            font-weight: 600;
        }

        .table tbody tr {
            border-bottom: 1px solid #ecf0f1;
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            box-shadow: inset 0 0 10px rgba(231, 76, 60, 0.1);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
        }

        /* Badges */
        .badge {
            padding: 0.6rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .bg-info {
            background-color: var(--accent-color) !important;
        }

        /* Forms */
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(231, 76, 60, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
            border: none;
            border-left: 5px solid;
        }

        .alert-success {
            background-color: #d5f4e6;
            color: #27ae60;
            border-left-color: #27ae60;
        }

        .alert-danger {
            background-color: #fadbd8;
            color: #c0392b;
            border-left-color: #c0392b;
        }

        /* Modals */
        .modal-content {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 50px rgba(0,0,0,0.3);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 15px 15px 0 0;
        }

        .modal-title {
            font-weight: 700;
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 3rem 0;
            margin-top: 5rem;
            border-top: 4px solid var(--primary-color);
        }

        footer h5 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        footer a {
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: var(--primary-color);
        }

        /* Utilities */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--dark-color);
            font-weight: 700;
        }

        .container {
            max-width: 1200px;
        }

        .display-4, .display-5 {
            font-weight: 800;
            letter-spacing: -1px;
        }

        .text-muted {
            color: #7f8c8d !important;
        }

        .table-dark {
            background-color: var(--dark-color) !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/blogspot/index.php">
            <i class="fas fa-blog"></i> BlogSpot
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/blogspot/index.php"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <?php if(isset($_SESSION['login'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/blogspot/admin/index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blogspot/auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/blogspot/auth/login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">