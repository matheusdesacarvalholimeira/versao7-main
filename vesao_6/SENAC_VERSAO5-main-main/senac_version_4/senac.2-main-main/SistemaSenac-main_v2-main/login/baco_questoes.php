<?php 
if(isset($_POST['lista_questoes'])){
header('location: professores.php');
}
?>

<form action="" method="post">
<input type="submit" class="apare btn btn-primary" value="Liste de questôes" name="lista_questoes">
</form>