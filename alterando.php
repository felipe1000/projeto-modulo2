<?php
session_start();

if(!isset($_SESSION['login']) or $_SESSION['login'] != 1){
  header("Location: home.php");
}

$pagina=$_POST['pagina'];
$conteudo=$_POST['editor1'];
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

		  <div class="span9 pesquisa">

		  	<?php 

               require_once "conexaoDB.php";

               $conn= conexaoDB();
               $sql= "UPDATE `conteudos` SET conteudo=:conteudo WHERE pagina=:pagina";;
               $stmt = $conn->prepare($sql);
               $stmt->bindValue("conteudo",$conteudo);
               $stmt->bindValue("pagina",$pagina);
               $stmt->execute();
               
               echo "<h2>Conteudo Alterado com sucesso!</h2> <br>";
               echo "<a href='secreta.php'>Voltar</a>";

            ?>
		  </div>
	    </div>
        <div class="botao_fixture"><a href="fixture.php" class="btn btn-primary">Executar Fixture</a></div>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>