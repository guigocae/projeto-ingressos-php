<?php
    session_start();
    $jogo = $_POST["jogo"];
    $setor = $_POST["setor"];
    $quantidade = $_POST["quantidade"];
    $meia = $_POST["meia"];
    $ingresso = 0;

    switch ($jogo) {
        case "sao-paulo":
            $_SESSION["jogo"] = "Palmeiras X São Paulo";
            break;
        case "bahia":
            $_SESSION["jogo"] = "Palmeiras X Bahia";
            break;
        case "botafogo":
            $_SESSION["jogo"] = "Botafogo X Palmeiras";
            break;
    }

    if($setor == "norte"){
        $ingresso = 100;
        $ingresso_new = $ingresso;
        $_SESSION["setor"] = "Gol Norte";

        if($_SESSION["plano"] == "Ouro" || $_SESSION["plano"] == "Diamante"){
            $ingresso_new = 0; 
        } elseif($_SESSION["plano"] == "Prata"){
            $ingresso_new -= $ingresso_new*0.5;
        } else { //bronze
            $ingresso_new -= $ingresso_new*0.2;
        }

    } elseif($setor == "sul"){
        $ingresso = 140;
        $ingresso_new = $ingresso;
        $_SESSION["setor"] = "Gol Sul";

        if($_SESSION["plano"] == "Diamante"){
            $ingresso_new = 0;
        } elseif($_SESSION["plano"] == "Ouro"){
            $ingresso_new -= $ingresso_new*0.75;
        } elseif($_SESSION["plano"] == "Prata"){
            $ingresso_new -= $ingresso_new*0.5;
        } 

    } elseif ($setor == "leste") {
        $ingresso = 180;
        $ingresso_new = $ingresso;
        $_SESSION["setor"] = "Central Leste";

        if($_SESSION["plano"] == "Diamante"){
            $ingresso_new = 0;
        } elseif($_SESSION["plano"] == "Ouro" || $_SESSION["plano"] == "Prata"){
            $ingresso_new -= $ingresso_new*0.5;
        }

    } else { //setor oeste
        $ingresso = 200;
        $ingresso_new = $ingresso;
        $_SESSION["setor"] = "Central Oeste";

        if($_SESSION["plano"] == "Ouro"){
            $ingresso_new -= $ingresso_new*0.25;
        } elseif($_SESSION["plano"] == "Diamante"){
            $ingresso_new = 0;
        }
    }

    if(isset($meia)){
        $ingresso_new /= 2;
        $_SESSION["meia"] = 's';
    }

   
    $_SESSION["quantidade"] = $quantidade;
    $_SESSION["ingresso"] = $ingresso_new;
    $_SESSION["ingresso_old"] = $ingresso;

    header("Location: ./index.php");
?>