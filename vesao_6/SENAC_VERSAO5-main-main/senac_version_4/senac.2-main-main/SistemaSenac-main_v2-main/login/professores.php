<?php

if(isset($_POST['lista_questoes'])){
  header('location: listar_questoes.php');
}
if(isset($_POST['baco_questoes'])){
  header('location: baco_questoes.php');
}


if(isset($_POST['evii'])){
  
  
  $gabarito = $_POST['gabarito'];
  echo  $gabarito;
  
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Professor</title>
</head>
<body>

  
  
    <nav class="navbar navbar-expand-sm " id="bgnav">
        <a class="navbar-brand" href="#">
        <img src="img/logo-senac.png" alt="logo" style="width:65px;" class="logoo">
        </a>
    </nav>
    <input type="submit" class="apare btn btn-primary" value="ADD Quetões">
    <form action="" method="post">
    <input type="submit" class="apare btn btn-primary" value="Liste de questôes" name="baco_questoes">
    </form>
    <form action="" method="post">
    <input type="submit" class="apare btn btn-primary" value="Baco de questoes" name="lista_questoes">
    </form>
    
    
  <div class="esconder">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ">Quetoes</h5>
        <button type="submit" class="btn-close"></button>

        <!--o x para cancelar a quetao-->
      <!--  <button type="submit" class="btn-close" ></button>-->
       
<form action="testes.php" method="post">
      </div>
      <div class="materias">
        <label for="">Materias: </label>
      <select>
          <option value="matematica">italo</option>
          <option value="matematica">matematica</option>v
          <option value="matematica">matematica</option>
          <option value="matematica">matematica</option>
          <option value="matematica">matematica</option>
      </select>
      </div>
      <div class="numques">
        <label for="" class="quess">numero da questao: </label>
        <input type="number" class="quess2" name="numeracao">
      </div>
      
      <div class="area_text">
        <textarea  id="questao_in" name="area_t"></textarea>
      </div>

      
      <select id="dif" name="dificuldade" class="difeques" >
          <option value=1>Dificuldade 1</option>
          <option value=2>Dificuldade 2</option>
          <option value=3>Dificuldade 3</option>
          <option value=4>Dificuldade 4</option>
          <option value=5>Dificuldade 5</option>
      </select>
      <div class="modal-footer">

      <label for="" id="gaba" >Gabarito:</label>
      <input type="text" name="gabarito">
        
      <input type="submit" value="Save changes" class="btn btn-primary" name="evii">

      
      
      </form>
      </div>
    </div>
  </div>
</div>
</div>

<script src="scripts/script_professor.js"></script>
</body>
</html>