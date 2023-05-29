<?php 
 
 include_once('confignotas.php');

if(isset($_POST['evii'])){
    $numeracao = $_POST['numeracao'];
    $questao = $_POST['area_t'];
    $dif = $_POST['dificuldade'];
    $gabarito = $_POST['gabarito'];
    
  }

  $result = mysqli_query($conexao, "INSERT INTO add_questoes(numerecao,questao,nivel,gabarito) VALUES ('$numeracao','$questao','$dif','$gabarito')");
  
  header("location: professores.php");

?>


