<?php
// Inicialize a sessão
session_start();

include_once "confignotas.php";


if(isset($_POST['submit'])){
    $sou = $_POST['tipo'];

    $sqlt = "SELECT * FROM users WHERE username = ? AND user_type = ?";
    $stmt = $conexao->prepare($sqlt);
    $stmt->bind_param("ss", $_SESSION['username'], $sou);
    $stmt->execute();
    $resultt = $stmt->get_result();
    
    // Verifique se o usuário já está logado, em caso afirmativo, redirecione-o para a página de boas-vindas
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $resultt->num_rows == 1 && $sou == "aluno"){
        header("location: welcome.php");
        exit;
    } elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $resultt->num_rows == 1 && $sou == "professor"){
        header("location: professores.php");
        exit;
    }elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $resultt->num_rows == 1 && $sou == "Coordenacao"){       
        header("location: coordecao.php");
        exit;
    } elseif(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $resultt->num_rows == 1 && $sou == "gestor"){
        header("location: gestor.php");
        exit;
    }
}


// Incluir arquivo de configuração
require_once "config.php";
 
// Defina variáveis e inicialize com valores vazios
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Verifique se o nome de usuário está vazio
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, insira o nome de usuário.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Verifique se a senha está vazia
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar credenciais
    if(empty($username_err) && empty($password_err)){
        // Prepare uma declaração selecionada
        $sql = "SELECT id, username, password FROM users WHERE email = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Definir parâmetros
            $param_username = trim($_POST["username"]);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                // Verifique se o nome de usuário existe, se sim, verifique a senha
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // A senha está correta, então inicie uma nova sessão
                            
                            
                            // Armazene dados em variáveis de sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirecionar o usuário para a página de boas-vindas
                           // if($resultt->num_rows == 1 && $sou == "aluno"){
                                //header("location: welcome.php");
                            //}elseif($resultt->num_rows == 1 && $sou == "professor"){
                               // header("location: professores.php");
                            //}elseif($resultt->num_rows == 1 && $sou == "Coordenacao"){
                                //header("location: coordecao.php");
                            //}elseif($resultt->num_rows == 1 && $sou == "gestor"){
                                //header("location: gestor.php");
                            //}
                        } else{
                            // A senha não é válida, exibe uma mensagem de erro genérica
                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else{
                    // O nome de usuário não existe, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }
    
    // Fechar conexão
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{ font: 14px sans-serif; }
        .wrappe{ 
            width: 390px; 
            background-color: #FCF3E5;
            margin-top: 20px;
            border-radius: 5px;
            padding: 10px;
            color: black;
            font-size: 15px;
         }

        .container{
            align-items: center;
            margin-top: 2px;
            box-shadow: none;
            width: 100%;
            display: flex;
            color: black;
            justify-content: center;
        }

        body{
            width: 100%;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm " id="bgnav">
    <!-- logo -->
    <a class="navbar-brand" href="#">
      <img src="img/logo-senac.png" alt="logo" style="width:65px;" class="logoo">
    </a>
    <!-- Links -->
    
  </nav>

  <div class="container">

    <div class="wrappe ">
        <h2>Login</h2>
        <p>Por favor, preencha os campos para fazer o login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
    <div class="">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email de usuário</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <label for="tipo" class="form-group selee">Sou</label>
                <select id="tipo" name="tipo" class="sou">
                    <option value="aluno">Aluno</option>
                    <option value="professor">Professor</option>
                    <option value="Coordenacao">Coordenacao</option>
                    <option value="gestor">Gestão</option>
                </select><br><br>
            <div class="form-group">
            <div class="form-group">
                
                <input type="submit" class="btn btn-primary" value="Entrar" name="submit">
            </div>
            <p>Não tem uma conta? <a href="register.php">Inscreva-se agora</a>.</p>
        </form>
    </div>
    </div>
   <script src="./scripts/script_log.js"></script>
</body>
</html>