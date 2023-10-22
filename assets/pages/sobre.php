<?php
    session_start();
    if(isset($_SESSION["cadastro"])){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cadastro.css">

    <style>
        .fa-solid.fa-cart-shopping {
            color: <?php if(isset($_SESSION["ingresso"])){echo "#FFB000";} ?>;
        }
    </style>
    
    <title>Document</title>
</head>
<body>
    <header>
        <div id="logo">
            <img src="../images/palmeiras_logo.png" alt="emblema do Palmeiras" id="logo-principal">
            <span class="titulo logo">Ingressos</span>
        </div>
        <div class="nome">
            <span class="titulo">Olá, <?php echo $_SESSION["nome"]; ?>!</span>
            <a href="../../sair.php"><i class="fa-solid fa-door-open"></i> Sair</a>
        </div>
    </header>
    <main>
        <nav class="nav">
            <a href="../../index.php"><i class="fa-solid fa-house"></i> Home</a>
            <a href="./carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
            <a href="./info.php"><i class="fa-solid fa-info"></i> Informações</a>
            <a href="./contato.php"><i class="fa-solid fa-envelope"></i> Contato</a>
            <a href="./sobre.php"><i class="fa-solid fa-pen"></i> Sobre</a>
        </nav>
        <div class="conteudo">
            <h2 class="titulo-page"><i class="fa-solid fa-pen"></i> Sobre</h2>
            <div class="container">
                
            </div>

        </div>
    </main>
    <script src="https://kit.fontawesome.com/9fa94335b9.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
    } else {
        include "../../index.php";
    }
?>