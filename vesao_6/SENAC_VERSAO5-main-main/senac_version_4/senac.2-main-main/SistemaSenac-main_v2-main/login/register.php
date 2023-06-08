<?php
// Incluir arquivo de configuração
require_once "config.php";

// Defina variáveis e inicialize com valores vazios
$username = $password = $confirm_password = $email = $user_type = "";
$username_err = $password_err = $confirm_password_err = $email_err = $user_type_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nome de usuário
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, coloque um nome de usuário.";
    } elseif (!preg_match('/^[a-zA-Z0-9_ ]+$/', trim($_POST["username"]))) {
        $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validar senha
    if (isset($_POST["password"])) {
        if (empty(trim($_POST["password"]))) {
            $password_err = "Por favor insira uma senha.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "A senha deve ter pelo menos 6 caracteres.";
        } else {
            $password = trim($_POST["password"]);
        }
    }

    // Validar e confirmar a senha
    if (isset($_POST["confirm_password"])) {
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Por favor, confirme a senha.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "A senha não confere.";
            }
        }
    }
    // Validar e-mail
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor, insira um endereço de e-mail.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Verifique os erros de entrada antes de inserir no banco de dados
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)){
    
    // Verifique os erros de entrada antes de inserir no banco de dados
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare uma declaração de inserção
        $sql = "INSERT INTO users (username, password, email, user_type) VALUES (:username, :password, :email, :user_type)";
         
        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":user_type", $param_user_type, PDO::PARAM_STR);
            // Definir parâmetros
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_user_type = $_POST["tipo"];
            // Tente executar a declaração preparada
            if($stmt->execute()){
                echo "<p>Registro realizado com sucesso. Redirecionando para a página de login...</p>";
                echo '<meta http-equiv="refresh" content="3;url=login.php">';
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
            

            // Fechar declaração
            unset($stmt);
        }
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        html{
            
        }
        body{ 
            font: 10px sans-serif;
            height: 100%;
            background-image: linear-gradient(to top right , #3103e5, #f5890c);
        }
        .wrappe{ 
            width: 390px; 
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
            background-color: rgba(1, 1, 1, 0);
        }

        body{
            width: 100%;
        }

        label{
            color: white;
        }

        p{
            color: white;
        }

        h2{
            color: white;
        }

        a{
            color: #f5890c;
        }
        .btn{
           
            background-color: #3103e5;
            border: #3103e5;
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
    <div class="wrappe">
        <h2>Cadastro</h2>
        <p>Por favor, preencha este formulário para criar uma conta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>  
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirme a senha</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
            <label for="tipo">Sou</label><br>
            <select id="tipo" name="tipo">
                <option value="aluno">Aluno</option>
                <option value="professor">Professor</option>
                <option value="Coordenacao">Coordenação</option>
                <option value="Gestor">Gestão</option>
            </select><br><br>
    </div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Criar Conta"><br><br>
    
</div>

            <p>Já tem uma conta? <a href="login.php">Entre aqui</a>.</p>
        </form>
    </div>  
    </div>      
</body>
</html>