<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(isset($title)){ echo $title; } ?> | Site TCC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta name="description" content="Plataforma simples e funcional para a exibição de comércios enfraquecidos na pandemia.">
    <meta name="keywords" content="pandemia comercios ecommerce">
</head>
<body>
    <nav class="navbar navbar-custom navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <i class="fa d-inline fa-lg fa-stop-circle"></i>
                <b>LOGO</b>
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10" aria-expanded="true">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="navbar-collapse collapse show" id="navbar10">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../register_place.php">Sugerir estabelecimento</a>
                    </li>
                        <?php
                            session_start();
                            if (isset($_SESSION['id']) && $_SESSION['loggedin'] === true): ?>
                            <li><a href="../account/favorites.php" class="nav-link">Meus favoritos</a></li>
                            <li><a href="../account/reset_password.php" class="nav-link">Esqueci minha senha</a><li>
                            <li><a href="../account/logout.php" class="nav-link">Sair</a></li>
                        <?php else:?>
                                <li><a href="../account/login.php" class="nav-link">Entrar</a></li>
            	        <?php endif; ?>
                    <li class="nav-item">
                        <form class="form-inline" action="../search.php" method="get">
                            <input class="form-control mr-sm-2" name="q" type="text" placeholder="Procure">
                            <button class="btn btn-success" type="submit">Procurar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
