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

		  	<?php 

             

               require_once "conexaoDB.php";

               $conn= conexaoDB();
               $pagina="servicos";
               $sql = "SELECT conteudo FROM conteudos WHERE pagina=:pagina";
               $stmt = $conn->prepare($sql);
               $stmt->bindValue("pagina",$pagina);
               $stmt->execute();
               $clientes = $stmt->fetch(PDO::FETCH_OBJ);

                echo $clientes->conteudo;
            ?>
		  	
		  </div>

	    </div>
        <div class="botao_fixture"><a href="fixture.php" class="btn btn-primary">Executar Fixture</a></div>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>