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

		  	<?php

                require_once "conexaoDB.php";

                echo "#### Executando Fixture Usuario####<br>";

                $conn= conexaoDB();

                echo "Removendo Tabela";
                $conn->query("DROP TABLE IF EXISTS usuario;");
                echo " -OK<br>";

                echo "Criando Tabela";
                $conn->query("CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(70) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;");
                echo " -OK<br>";

                echo "Inserindo Dados";

                $stmt = $conn->prepare("INSERT INTO `usuario` (`id_usuario`, `login`, `senha`) VALUES
(1, 'admin', '\$2y$10\$dkatnuvvyTTnaYConrZiSuJa2aJflmesUjBuqAM7C9zWb.f3E4hIu');");
                $stmt->execute();
                echo " -OK<br>";

                echo "#### Concluído ####<br>";
            ?>
		  	
		  </div>
	    </div>
        <div class="botao_fixture"><p><h4>Voltar para Home:</h4></p><a href="home.php" class="btn btn-primary">Home</a></div>
    </div>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>