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
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cadastro.css">

    <style>
        /* Cor do icon caso tenha adicionado ingresso ao carrinho */
        .fa-solid.fa-cart-shopping {
            color: <?php if(isset($_SESSION["ingresso"])){echo "#FFB000";} ?>;
        }
    </style>

    <title>Carrinho</title>
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
            <h2 class="titulo-page"><i class="fa-solid fa-cart-shopping"></i> Carrinho</h2>
            <!-- Caso tenha comprado -->
            <?php if(isset($_SESSION["ingresso"])){?>

                <div class="container">
                    <h3>Ingresso:</h3>
                    <ul>
                        <li><?php echo $_SESSION["jogo"]; ?></li>
                        <li><?php echo $_SESSION["setor"]; ?></li>
                        <li>Valor por ingresso: 
                            <!-- Valor inicial e quantidade, formatado para dinheiro -->
                            <?php 
                                $quantidade = $_SESSION["quantidade"];  
                                $ingresso = $_SESSION["ingresso_old"]; 
                                echo "x".$quantidade." R$ "; 
                                $ingresso = number_format($ingresso, 2); 
                                echo str_replace('.', ',', $ingresso); 
                            ?>
                        </li>
                        <!-- Total inicial, sem desconto -->
                        <li>Total: <?php echo "R$ ".$ingresso*$quantidade.",00"; ?></li>
                    </ul>
                    <h3>Descontos:</h3>
                    <ul>
                        <!-- Lista os descontos -->
                        <li>Plano <?php echo $_SESSION["plano"]; ?></li>
                        <?php if(isset($_SESSION["meia"])) echo "<li>Meia Entrada</li>"; ?>
                    </ul>
                    <!-- Valores com o desconto -->
                    <div class="valor-total">
                        <p>Valor por ingresso (com desconto): <strong>
                            R$
                                <?php
                                    $valor = $_SESSION["ingresso"];
                                    echo $valor.",00";
                            
                                ?>
                        </strong>
                        </p>
                        <p>Total a pagar: <strong>
                            R$
                                <?php
                                    $valor *= $quantidade;
                                    $valor_final = number_format($valor, 2);
                                    echo str_replace('.', ',', $valor_final);
                                ?>
                        </strong>
                        </p>
                    </div>
                </div>
            <!-- Caso não tenha comprado -->
            <?php
                } else {
            ?>
                <div class="container">
                    <h3>Compre seu ingresso!</h3>
                </div>
            <?php 
                } 
            ?>
        </div>    
    </main>
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/9fa94335b9.js" crossorigin="anonymous"></script>
</body>
</html>
<!-- Remove o erro caso volte para essa página após ter feito logout-->
<?php
    } else {
        include "../../index.php";
    }
?>