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
</head>
<body>
    
        <?php 
        echo "<form action='senac.php' method='get'>";
            while($prova=mysqli_fetch_assoc($result2)){
                echo "<div class='provajus'>";
                echo "<p>".$prova['questao']."</p>";
                echo "</div>";
                echo "<div class='provajus'>";
                echo "<p>".$prova['gabarito']."</p>";
                echo "</div>";
                echo '<input type="text" name="resposta" id="">';
            }
        echo "</form>";    
        ?>
    
</body>
</html>
