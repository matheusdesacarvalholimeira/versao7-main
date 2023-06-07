<?php 

include_once('confignotas.php');

$sql3 = "select * from questoes_celecionadas";
$result2 = $conexao->query($sql3);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container{
            align-items: center;
            margin-top: 2px;
            width: 100%;
            display: flex;
            columns: black;
            justify-content: center;
        }
        .provaju{
            
           width: 50%;
           background-color: white;
           box-shadow: 0.5px 0.5px 3px black;
           margin-top: 20px;
           border-radius: 5px;
           padding: 10px;
           color: black;
           font-size: 15px;
           margin-bottom: 20px;
        }
        .questao_numecao{
            margin: 0px;
            display: flex;
            width: 100%;
            background-color: cornflowerblue;
            align-items: center;
            justify-content: center;
            border-radius: 5px 5px 0px 0px;
            height: 70px;
            font-size: 15px;
            height: 50px;
        }

        .resposta{
            margin-bottom: 5px;
        }

        .questao{
            text-align: left;
            word-break: break-all;
        }
        .resosta_sep{
            margin-bottom: 70px;
        }
        .enviar_questoes{
            margin-top: 20px;
            width: 100%;
        }

        .btn_enviar{
            width: 100%;
            height: 50px;
            border: none;
            background-color: chocolate;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bolder;
        }

        body{
            background-color: antiquewhite;
        }

        .resosta_sep{
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: center;
        }

        .resposta_gab{
            width: 100%;
        }


    </style>
</head>
<body>
    
        <?php 
        $num_questao = 1;
        echo "<form action='prova_resposta.php' method='get'>";
        echo '<div class="container">';
        echo '<div class="provaju">';
            while($prova=mysqli_fetch_assoc($result2)){
                echo '<div class="questao_numecao">';
                echo '<h1>Questao '.$num_questao.' </h1>';
                echo "</div>";
                $num_questao++;
                echo "<div class='provajus'>";
                echo "<p class='questao'>".$prova['questao']."</p>";
                echo "</div>";
                echo "<div class='provajus'>";
                echo "<p>".$prova['gabarito']."</p>";
                echo "</div>";
                echo '<div class="resosta_sep">';
                echo '<input type="text" name="resposta[]" id="" class="resposta_gab">';
                echo "</div>";
            }
        echo '<div class="enviar_questoes">';   
        echo '<input type="submit" name="enviando_questoes" id="" class="btn_enviar">'; 
        echo '</div>';  
        echo "</form>";
        echo "</div>";
        echo "</div>";
        ?>
    
</body>
</html>
