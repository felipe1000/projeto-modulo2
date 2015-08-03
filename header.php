<div class="navbar navbar-inverse navbar-fixed-top">
      
    <div class="navbar-inner">
        <div class="container">
          <div class="nav-collapse collapse">
            <ul class="nav">
               <?php if (isset($_SESSION['login'])){
                  
                  echo "<li class=''>Olá, seja bem vindo " .$_SESSION['nome']."</li>";
               }else{?>
                <li class="">
                    <form class="form-inline" action="login.php" method="post">
                      <label class="text">Aceso a Área Restrita:</label>
                      <input name="login" type="text" class="input-small" placeholder="Login">
                      <input name="senha" type="password" class="input-small" placeholder="Senha">
                      <label class="checkbox">
                        <input type="checkbox"> Lembre-se de mim
                      </label>
                      <button type="submit" class="btn">Entrar</button>
                    </form>
                </li>
                <?php }

                if (isset($_SESSION['login'])){
                    echo "<li class=''><a href='deslogar.php'>Deslogar</a></li>";
                }
              ?>
            </ul>
          </div>
        </div>
    </div>
</div>
<header class="jumbotron subhead">
		<div class="container">
			<h1>Site Simples em PHP</h1>
			<p>Um site simples em PHP com estilização em Twitter bootstrap</p>
            <form class="form-search" action="pesquisa.php" method="post">
                Pesquisa por palavra-chave:&nbsp;
             <div class="input-append">
                <input type="text" class="span2 search-query" name="palavra">
                <button type="submit" class="btn">Busca</button>
             </div>
            </form>
		</div>
	</header>