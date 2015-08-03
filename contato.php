<?php
session_start();
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

		  	<?php include_once("contato.html"); ?>
		  	
		  </div>
	    </div>

	    <?php
	      
	      if( isset($_POST['nome']) or isset($_POST['email']) or isset($_POST['assunto']) or isset($_POST['mensagem']) ){
	      	$nome=$_POST['nome'];
            $email=$_POST['email'];
            $assunto=$_POST['assunto'];
            $mensagem=$_POST['mensagem'];

	      	if( !empty($nome) and !empty($email) and !empty($assunto) and !empty($mensagem)){
	      		
	      		?>	
	          	<div class="alert alert-block alert-success">
			  	<a href="contato.php" class="close" data-dismiss="alert">×</a>
			  	<strong>Dados Enviados com Sucesso!</strong> abaixo seguem os dados que você enviou<br>
			  	Nome: <strong><?php echo $nome ;?></strong><br>
			  	Email: <strong><?php echo $email ;?></strong><br>
			  	Assunto: <strong><?php echo $assunto;?></strong><br>
			  	Mensagem: <strong><?php echo $mensagem;?></strong><br>
			    </div>
		        <?php
		    }else{
		    	?>

		    	<div class="alert alert-block alert-error">
			  	<a href="contato.php" class="close" data-dismiss="alert">×</a>
			  	<strong> Campos a Preencher! </strong> Por favor preencha todos os Campos. 
			    </div>

			    <?php
		    }
          
          }
        ?>

    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>