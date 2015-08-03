<?php
session_start();

if(!isset($_SESSION['login']) or $_SESSION['login'] != 1){
  header("Location: home.php");
}

$pagina=$_GET['pagina'];

if(!isset($pagina)){
    
    header('Location:secreta.php');
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
    <script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
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
               $sql = "SELECT conteudo FROM conteudos WHERE pagina=:pagina";
               $stmt = $conn->prepare($sql);
               $stmt->bindValue("pagina",$pagina);
               $stmt->execute();
               $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
               $conteudo = $resultado->conteudo;
            ?>
              <form action="alterando.php" method="post">
                <input type="text"  style="display:none" name="pagina" value=<?php echo $pagina; ?>>  
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                    <?php echo $conteudo; ?>
                </textarea>
                <script>
                    CKEDITOR.replace( 'editor1' );
                </script>
                <div class="form-actions">
                   <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                   <a href="secreta.php" class="btn">Cancelar</a>
                </div>
              </form>
		  </div>
	    </div>
        <div class="botao_fixture"><a href="fixture.php" class="btn btn-primary">Executar Fixture</a></div>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>