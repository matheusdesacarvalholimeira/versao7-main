<?php

include_once('confignotas.php');

echo "professores ou alunos";

$sql = "SELECT * FROM users WHERE user_type = 'aluno'";
$result = $conexao->query($sql);

if(isset($_POST['professores'])){
   echo "deu certo";
   $sql = "SELECT * FROM users WHERE user_type = 'professor'";
   $result = $conexao->query($sql);
}elseif(isset($_POST['alunos'])){
    echo "deu certo";
    $sql = "SELECT * FROM users WHERE user_type = 'aluno'";
    $result = $conexao->query($sql);

}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    
    <button name="alunos" class="apare btn btn-primary">aluos</button>
    <button name="professores" class="apare btn btn-primary">professores</button>
    </form>

   
    
     <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Email </th>
                <th scope="col">Nome do aluno</th>
                <th scope="col">Categoria</th>
                <th scope="col">Momento de login</th>
                
            </tr>
        </thead>
        <thead>
            <?php
                 while($user_data=mysqli_fetch_assoc($result)){
                    echo "<tr>";  
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['email']."</td>";
                    echo "<td>".$user_data['username']."</td>";
                    echo "<td>".$user_data['user_type']."</td>";
                    echo "<td>".$user_data['created_at']."</td>";
                    
                    echo "</tr>";  
                 }
            ?>
            
        </thead>
        <thead>
                
            </thead>
     </table>
     
           
        
       
        
        
     
         

     
</body>
</html>