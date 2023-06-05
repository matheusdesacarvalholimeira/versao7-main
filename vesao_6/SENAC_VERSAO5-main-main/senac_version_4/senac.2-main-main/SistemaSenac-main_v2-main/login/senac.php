<?php



include_once('confignotas.php');

$vai = $_GET['enviar-questoes'];

//echo $vai[2];




$quantarry = count($vai);

$cont1 = 0;
$cont2 = 0;


while($cont1 < $quantarry){
    $cont1 ++;
    
    
    $sql = "select questao, gabarito from add_questoes where id_questoes = $vai[$cont2];";
    $result = $conexao->query($sql);
    //o while abaixo esta incerindo que o valor ao $user_data seral igual a uma funcao que pega o valor da varivel 
    //$result que por sua vez ega o retorno do banco
    while($user_data=mysqli_fetch_assoc($result)){
        
        
        $sql2 = "insert into questoes_celecionadas (questao,gabarito) values ('".$user_data["questao"]."','".$user_data["gabarito"]."')";
        $conexao->query($sql2); 
       
    }
    echo "<br>";
    $cont2++;
}



//echo "<br>";
//echo $quantarry;

//$id = $_GET['id'];
//echo "$id";

//$questoes = array();
//$questoes['$id'];
//echo $questoes;

//array_push($questoes, "$id");

//echo "$questoes";



    

    //while($prova=mysqli_fetch_assoc($result2)){

    //}

 
    
    //if(isset($_GET['lista_questoes'])){
        //header('location: provac.php');
      //}
    //echo "<form action='' method='get'>";
    //echo "<button name='lista_questoes'>vai</button>";
    //echo "</form>"
    
    header('location: provac.php');
?>


