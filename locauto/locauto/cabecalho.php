<!-- Este é o cabeçalho do site -->
<!-- Aqui foi usado uma CSS chamada BULMA -->
<!-- O uso completo e entendimento dela pode ser encontrado aqui neste site https://bulma.io -->
<!-- Para a configuração deste HEADER/Cabeçalho foi usado este link -->
<!-- https://bulma.io/documentation/components/navbar/ -->

<!-- ESTE ARQUIVO FICARA ATIVADO ENQUANTO O USUÁRIO NÃO ESTIVER LOGADO -->

<nav class="navbar is-dark is-fixed-top">
      <div class="container">
		<div class="navbar-brand">
          <a class="navbar-item" title="Pagina inicial" style="font-weight:bold;">
          <strong>Locauto®</strong></a>
			<a href="admin.php" class="navbar-item is-active"><strong>A</strong></a>
			<a href="funcionario.php" class="navbar-item"><strong>F</strong></a>
          <span class="navbar-burger burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navMenu" class="navbar-menu">
          <div class="navbar-end">
			<a href="index.php" class="navbar-item is-active"><strong>Inicio</strong></a>
			<a href="sobre_nos.php" class="navbar-item"><strong>Sobre nós</strong></a>
            <a href="fale_conosco.php" class="navbar-item"><strong>Fale Conosco</strong></a>
	  
          </div>
        </div>
      </div>
    </nav>
    <script type="text/javascript">
      (function() {
        var burger = document.querySelector('.burger');
        var nav = document.querySelector('#'+burger.dataset.target);
        burger.addEventListener('click', function(){
          burger.classList.toggle('is-active');
          nav.classList.toggle('is-active');
        });
      })();
    </script>