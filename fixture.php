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

                echo "#### Executando Fixture ####<br>";

                $conn= conexaoDB();

                echo "Removendo Tabela";
                $conn->query("DROP TABLE IF EXISTS conteudos;");
                echo " -OK<br>";

                echo "Criando Tabela";
                $conn->query("CREATE TABLE IF NOT EXISTS `conteudos` (
  `id_conteudo` int(10) NOT NULL AUTO_INCREMENT,
  `pagina` varchar(50) NOT NULL,
  `conteudo` varchar(500) NOT NULL,
  PRIMARY KEY (`id_conteudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;");
                echo " -OK<br>";

                echo "Inserindo Dados";

                $stmt = $conn->prepare("INSERT INTO `conteudos` (`id_conteudo`, `pagina`, `conteudo`) VALUES
(1, 'home', '<p> Este site foi feito em PHP com estilização em bootstrap com a finalidae de testar<br>\r\nconhecimentos de PHP para o curso trilhando caminho com PHP da school of net</p>'),
(2, 'empresa', 'Empresa criada em 2015 com o intuito de desenvolver sites e sistemas em PHP.<br>\r\nCom o crescimento do mercado on line a procura por sites aumentou bastante nos últimos anos e não é só<br> sites estáticos mas também sites dinamicos com interação dos usuários principalmente e-comerce.<br>\r\n\r\nE é com essa nescessidade que criamos sites e com isso contribuimos para<br>\r\no desenvolvimento de outras empresas e consequentemente a melhora de seus resultados.'),
(3, 'produtos', '<p>Nossos Produtos são:</p>\r\n <ul>\r\n 	<li> Sites Estáticos</li>\r\n	<li> Sites Dinamicos</li>\r\n	<li> Otimização de Sites - SEO </li>\r\n	<li> Layouts </li>\r\n	<li> Sistemas Integrados </li>\r\n	<li> Web Marketing </a></li>\r\n </ul>'),
(4, 'servicos', '<p>Nossos Serviços são:</p>\r\n<p>Criação de Sites e Sistemas para Internet, layout para cartão de visita<br>\r\nfolders e banners.</p>\r\n<p>Publicação, hospedagem, logotipos e logomarcas.</p>');");
                $stmt->execute();
                echo " -OK<br>";

                echo "#### Concluído ####<br>";
            ?>
		  	
		  </div>
	    </div>
        <div class="botao_fixture"><a href="fixture.php" class="btn btn-primary">Fixture</a></div>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>