<?php

    $login=  $_POST['login'];
    $senha=  $_POST['senha'];

    require_once "conexaoDB.php";

    $conn= conexaoDB();

    $sql = "SELECT * FROM usuario WHERE login=:login";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue("login",$login);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        
        $verifica=$row->senha;
        
        if (password_verify($senha,$verifica) == 1) {
            
            session_start();
            
            $_SESSION['login']=1;
            $_SESSION['nome']=$login;
            header("Location: secreta.php");
        
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Projeto- fase 1 - módulo2"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Projeto- fase 2 - módulo2</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="estilo.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>

	<?php include_once("header.php"); ?>
	
	<div class="container">
		<div class="row">
			
		<?php include_once("menu.php"); ?>

		  <div class="span9">

           <br><h2>"login ou senha errado!"</h2><br>	
		  	<a href="home.php">Voltar a Home</a>
		  </div>
	    </div>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>