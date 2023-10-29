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
    <link rel="stylesheet" href="../css/sobre.css">

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
                <div class="section membros">
                    <h3>Membros do grupo</h3>
                    <p>Guilherme Gomes Caetano</p>
                </div>
                <div class="section extruturas">
                    <h3>Resumo</h3>
                    <p>O projeto é um site de venda de ingressos. O usuário faz um cadastro e a partir dele o sistema usa as informaçoes para descartar certas funcionalidades logo no início, como o benefício da meia-entrada ou gratuidade. Na tela Home o usuário escolhe o tipo do ingresso, e envia para o carrinho. No carrinho são mostradas as informações relacionadas ao preço e aos descontos aplicados de acordo com o plano ou condição (melhor explicado na página Informações).</p>
                </div>
                <div class="section informac">
                    <h3>Funcionalidades utilizadas</h3>
                    <p>No cadastro foram utilizadas sessions para guardar informações, sendo:</p>
                    <ul>
                        <li>Nome: Para ser mostrado no header do site.</li>
                        <li>Idade: A compra de ingressos é limitada para menores de 16 anos. Para maiores de 60 anos a entrada é de graça. O valor armazenado na session entra em uma extrutura de condição composta.</li>
                        <li>Plano: Cada plano tem suas próprias porcentagens de desconto para cada setor do estádio. O valor armazenado na session entra na mesma extrutura de condição da idade, para definir a gratuidade. O valor é também guardado em outra session, para cálculo de descontos posteriores.</li>
                        <li>Estudante: Caso o comprador seja estudante, tem direito à meia-entrada. O valor da session habilita esse direito.</li>
                    </ul>
                    <p>Na Home, onde é mostrado o formulário para compra, foram utilizadas sessions para guardar os seguintes valores:</p>
                    <ul>
                        <li>Jogo: O jogo escolhido não tem interferência no valor do ingresso. É usado apenas para indentificá-lo no carrinho. O nome é armazenado em uma session usando uma estrutura switch/case.</li>
                        <li>Setor: O valor do setor é armazenado em uma session e usado para calcular o valor final do ingresso. Foi utilizada uma estrutura if/elseif/else, combinando o plano e o setor para calcular os descontos no ingresso.</li>
                        <li>Quantidade: A quantidade só é usada para multiplicar o valor do ingresso de acordo com o número escolhido.</li>
                        <li>Meia-entrada: Caso a meia-entrada esteja habilitada, o valor do ingresso é reduzido pela metade.</li>
                    </ul>
                    <p>No carrinho são mostrados os valores finais armazenados nas sessions:</p>
                    <ul>
                        <li>Uma session é usada para mudar a cor do carrinho após o ingresso ser adicionado.</li>
                        <li>Os valores pré-estabelecidos e os descontos são armazenados em variáveis para serem mostrados ao usuário.</li>
                    </ul>
                    <p>Algumas funções foram utilizadas ao longo do desenvolvimento para evitar bugs e conflitos entre sessions. Ex: isset(), include().</p>
                    <p>Foi ultilizado uma fonte externa no HTML para carregar os ícones usados em cada página. O site foi adicionado nas referências mais abaixo.</p>
                    <p>O layout do site foi desenvolvido usando algumas funcionalidades do CSS</p>
                    <ul>
                        <li>Flexbox: Usado para construir o layout, posicionando os elementos através do atributo e valor display:flex.</li>
                        <li>Alguns elementos foram editados com o valor absoluto, para melhor posicionamento.</li>
                        <li>O estilo do elemento input[type="radio"] foi retirado do fórum StackOverflow, alterando apenas as cores.</li>
                        <li>Foramo usadas pseudo-classes: :hover, :after, :active.</li>
                    </ul>

                </div>
                <div class="section referencias">
                    <h3>Referências</h3>
                    <p>Informações, preços e tabelas foram baseados no site de ingressos do Palmeiras (com algumas modificações): https://www.palmeiras.com.br/ingressos/</p>
                    <p>Cores: https://colorhunt.co/palette/004225f5f5dcffb000ffcf9d</p>
                    <p>Fonte: https://fonts.google.com/specimen/Manrope?query=manrope</p>
                    <p>Icons: https://fontawesome.com/</p>
                </div>
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