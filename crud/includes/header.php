<?php
function getBaseURL() {
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
    $base_url .= $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    
    // Jika berada di subfolder pages atau actions, naik satu level
    if (strpos($base_url, '/pages/') !== false || strpos($base_url, '/actions/') !== false) {
        return dirname(dirname($base_url)) . '/';
    }
    
    return dirname($base_url) . '/';
}

function isCurrentPage($page) {
    return basename($_SERVER['PHP_SELF']) === $page;
}

// Start session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP MySQL Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo getBaseURL(); ?>style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo getBaseURL(); ?>index.php">Inventory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isCurrentPage('index.php') ? 'active' : ''; ?>" 
                           href="<?php echo getBaseURL(); ?>index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isCurrentPage('features.php') ? 'active' : ''; ?>" 
                           href="<?php echo getBaseURL(); ?>pages/features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isCurrentPage('pricing.php') ? 'active' : ''; ?>" 
                           href="<?php echo getBaseURL(); ?>pages/pricing.php">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <?php echo $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <?php echo $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>