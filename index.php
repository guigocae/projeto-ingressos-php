<!-- Remove o erro caso session já estiver iniciado em outra página -->
<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/cadastro.css">

    <style>
        /* Muda cor do carrinho, caso o ingresso já tenha sido enviado */
        .fa-solid.fa-cart-shopping {
            color: <?php if(isset($_SESSION["ingresso"])){echo "#FFB000";} ?>;
        }
        /* Muda cor do texto, de acordo com o plano escolhido */
        #plano-atual {
            color: <?php
                    switch($_SESSION["plano"]){
                        case "Diamante":
                            echo "#789aa2";
                            break;
                        case "Ouro":
                            echo "#AF9500";
                            break;
                        case "Prata":
                            echo "#B4B4B4";
                            break;
                        case "Bronze":
                            echo "#6A3805";
                    }
                ?>;
        }  
    </style>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Ingressos</title>
</head>
<body>
    <!-- Se já cadastrado -->
    <?php
        if(isset($_SESSION["cadastro"]) && $_SESSION["cadastro"] == 's'){
    ?>
    <header>
        <div id="logo">
            <img src="./assets/images/palmeiras_logo.png" alt="emblema do Palmeiras" id="logo-principal">
            <span class="titulo logo">Ingressos</span>
        </div>
        <div class="nome">
            <!-- Mostra o nome coletado no cadastro -->
            <span class="titulo">Olá, <?php echo $_SESSION["nome"]; ?>!</span>
            <a href="./assets/pages/sair.php"><i class="fa-solid fa-door-open"></i> Sair</a>
        </div>
    </header>
    <main>
        <nav class="nav">
                <a href="./index.php"><i class="fa-solid fa-house"></i> Home</a>
                <a href="./assets/pages/carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
                <a href="./assets/pages/info.php"><i class="fa-solid fa-info"></i> Informações</a>
                <a href="./assets/pages/contato.php"><i class="fa-solid fa-envelope"></i> Contato</a>
                <a href="./assets/pages/sobre.php"><i class="fa-solid fa-pen"></i> Sobre</a>
        </nav>
        <div class="conteudo">
            <h2 class="titulo-page"><i class="fa-solid fa-house"></i> Home</h2>
            <h3 id="plano-atual">Plano <?php echo $_SESSION["plano"]; ?></h3>
            <div class="container">
                <h2>Comprar Ingresso:</h2>
                <form action="./assets/pages/comprar.php" method="post">
                    <!-- Selecionar o jogo -->
                    <div class="form-div">
                        <fieldset>
                            <legend class="titulo-form">Selecione o jogo:</legend>
                            <div class="jogo">
                                <input type="radio" id="saopaulo" name="jogo" value="Palmeiras X São Paulo" required>
                                <label for="saopaulo">Palmeiras X São Paulo</label>
                            </div>
                            <div class="jogo">
                                <input type="radio" id="bahia" name="jogo" value="Palmeiras X Bahia">
                                <label for="bahia">Palmeiras X Bahia</label>
                            </div>
                            <div class="jogo">
                                <input type="radio" id="botafogo" name="jogo" value="Botafogo X Palmeiras">
                                <label for="botafogo">Botafogo X Palmeiras</label>
                            </div>
                        </fieldset>
                    </div>
                    <!-- Selecionar o setor -->
                    <div class="form-div">
                        <fieldset>
                            <legend class="titulo-form">Selecione o setor:</legend>
                            <div class="setor">
                                <input type="radio" id="gol-norte" name="setor" value="sul" required>
                                <label for="gol-sul">Gol Sul</label>
                            </div>
                            <div class="setor">
                                <input type="radio" id="gol-sul" name="setor" value="norte">
                                <label for="gol-norte">Gol Norte</label>
                            </div>
                            <div class="setor">
                                <input type="radio" id="central-leste" name="setor" value="leste">
                                <label for="central-leste">Central Leste</label>
                            </div>
                            <div class="setor">
                                <input type="radio" id="central-oeste" name="setor" value="oeste">
                                <label for="central-oeste">Central Oeste</label>
                            </div>
                        </fieldset>
                    </div>
                    <!-- Selecionar a quantidade -->
                     <div class="form-div">
                         <label for="qtd" class="titulo-form">Selecione a quantidade:</label>
                         <select name="quantidade" id="qtd" required>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                         </select>
                     </div>
                     <!-- Selecionar meia entrada -->
                     <div class="form-div">
                        <!-- Condição meia-entrada ou gratuidade -->
                        <?php
                            if($_SESSION["plano"] == "Diamante" || $_SESSION["idade"] >= 60){
                        ?>
                            <p>Você tem direito a gratuidade!</p>
                        <?php
                          } else {
                        ?>
                            <label for="meia-entrada" class="titulo-form">Deseja meia-entrada?</label>
                            <input type="checkbox" id="meia-entrada" name="meia" value="meia" <?php if(($_SESSION["estudante"] == "não" && $_SESSION["idade"] < 60)){echo "disabled";} ?>>
                        <?php
                            }
                        ?>
                     </div>
                     <!-- Enviar -->
                     <input type="submit" value="Enviar" class="input-submit">
                     <!-- Mensagem ao adicionar no carrinho -->
                     <?php if(isset($_SESSION["ingresso"])){echo "<p style='font-size:.8em; margin-top:5px;'>Adicionado no carrinho</p>";} ?>
                </form>
            </div>
        </div>
    </main>
    <!-- Se não cadastrado -->
    <?php
        } else {
    ?>
        <div class="container container-cadastro">
        <h2 class="titulo-page"><i class="fa-solid fa-address-card"></i> Cadastro</h2>
        <form action="./assets/pages/cadastro.php" method="post" class="form-cadastro">
            <div class="input-cad">
                <label for="nome" class="titulo-form">Digite seu nome:</label>
                <input type="text" maxlength="15" name="nome" id="nome" required>
            </div>
            <div class="input-cad">
                <label for="idade" class="titulo-form">Digite sua idade:</label>
                <input type="number" min="16" max="100" id="idade" name="idade" required>
            </div>
            <fieldset id="plan">
                <legend class="titulo-form">Selecione o plano:</legend>
                <div class="plano">
                    <input type="radio" id="bronze" name="plano" value="Bronze" required>
                    <label for="bronze">Plano Bronze</label>
                </div>
                <div class="plano">
                    <input type="radio" id="prata" name="plano" value="Prata">
                    <label for="prata">Plano Prata</label>
                </div>
                <div class="plano">
                    <input type="radio" id="ouro" name="plano" value="Ouro">
                    <label for="ouro">Plano Ouro</label>
                </div>
                <div class="plano">
                    <input type="radio" id="diamante" name="plano" value="Diamante">
                    <label for="diamante">Plano Diamante</label>
                </div>
            </fieldset>
            <div class="estudante">
                <label for="estudante" class="titulo-form">Você é estudante?</label>
                <select name="estudante" id="estudante" required>
                   <option value="não" selected>NÃO</option>
                   <option value="sim">SIM</option>
                </select>
            </div>
            <input type="submit" value="Enviar" class="input-submit inp2">
        </form>
    </div>

    <?php  
        }
    ?>
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/9fa94335b9.js" crossorigin="anonymous"></script>
</body>
</html>