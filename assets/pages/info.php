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
    <link rel="stylesheet" href="../css/info.css">
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
            <h2 class="titulo-page"><i class="fa-solid fa-info"></i> Informações</h2>
            <div class="container">
                <p>O preço dos ingressos é calculado de acordo com algumas regras e critérios.</p>
                <p class="table-title">Valor dos ingressos sem descontos:</p>
                <table>
                    <tr>
                        <th>Setor do estádio</th>
                        <th>Valor do ingresso</th>
                    </tr>
                    <tr>
                        <td>Gol Norte</td>
                        <td>R$100,00</td>
                    </tr>
                    <tr>
                        <td>Gol Sul</td>
                        <td>R$140,00</td>
                    </tr>
                    <tr>
                        <td>Central Leste</td>
                        <td>R$180,00</td>
                    </tr>
                    <tr>
                        <td>Central Oeste</td>
                        <td>R$200,00</td>
                    </tr>
                </table>
                <p class="table-title">Tabela de descontos por setor:</p>
                <table>
                    <tr>
                        <th rowspan="2">Setores e Planos</th>
                        <th colspan="4">Descontos por setor</th>
                    </tr>
                    <tr>
                        <th>Gol Norte</th>
                        <th>Gol Sul</th>
                        <th>Central Leste</th>
                        <th>Central Oeste</th>
                    </tr>
                    <tr>
                        <th style="color: #789aa2;">Plano Diamante</th>
                        <td>100&#37;</td>
                        <td>100&#37;</td>
                        <td>100&#37;</td>
                        <td>100&#37;</td>
                    </tr>
                    <tr>
                        <th style="color: #AF9500;">Plano Ouro</th>
                        <td>100&#37;</td>
                        <td>75&#37;</td>
                        <td>50&#37;</td>
                        <td>25&#37;</td>
                    </tr>
                    <tr>
                        <th style="color: #B4B4B4;">Plano Prata</th>
                        <td>50&#37;</td>
                        <td>50&#37;</td>
                        <td>50&#37;</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th style="color: #6A3805;">Plano Bronze</th>
                        <td>20&#37;</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
                <h4>Meia-entrada</h4>
                <p>Estudantes tem direito a meia-entrada - LEI FEDERAL Nº 12.852 (ESTATUTO DA JUVENTUDE) E 12.933/2013</p>
                <h4>Gratuidade</h4>
                <p>Tem direito a gratuidade adultos com idade igual ou superios a 60 anos e assinantes do Plano Diamante.</p>
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