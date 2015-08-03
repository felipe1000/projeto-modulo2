<?php
session_start();

if(!isset($_SESSION['login']) or $_SESSION['login'] != 1){
  header("Location: home.php");
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

		  <div class="span9 pesquisa">

		  	<?php 

              echo "<h2>Área Restrita</h2> <br>";

               require_once "conexaoDB.php";

               $conn= conexaoDB();
               $sql= "SELECT `pagina` FROM `conteudos`";
               $stmt = $conn->prepare($sql);
               $stmt->execute();
               echo "selecione alguma página para alterar: <br>";
               ?><form class="form-inline" action="alterar.php" method="post"><?php
               while ( $linha = $stmt->fetch() ) {
                   $pagina=$linha['pagina'];
                   echo"<a href='alterar.php?pagina=$pagina'>".$linha['pagina']."</a><br>";
               }
                 
            ?>
              </form>
		  </div>
	    </div>
        <?php include_once("fixture.php"); ?>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>