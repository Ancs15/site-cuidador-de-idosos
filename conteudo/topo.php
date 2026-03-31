    <header class="topo" id="topo-fixo">
        <div class="padrao">
            <!-- Logo -->
            <h1>Senior Life SP</h1>

            <button class="abrir-menu"></button>
            <nav class="menu">
                <button class="fechar-menu"></button>
                <?php $PgAtual = basename($_SERVER['PHP_SELF'])?>
                <ul>
                    <li><a class="<?php if($PgAtual == 'index.php') echo 'botao-ativo';?>" href="index.php">Home</a></li>
                    <li><a class="<?php if($PgAtual == 'sobre.php') echo 'botao-ativo';?>" href="sobre.php">Sobre</a></li>
                    <li><a class="<?php if($PgAtual == 'servicos.php') echo 'botao-ativo';?>" href="servicos.php">Serviços</a></li>
                    <li><a class="<?php if($PgAtual == 'local.php') echo 'botao-ativo';?>" href="local.php">Local</a></li>
                </ul>
                <ul class="redes-sociais">
                    <li><a href="#" target="_blank"><img src="assets/facebook-24.png" alt="Facebook - Senior Life SP"></a></li>
                    <li><a href="#" target="_blank"><img src="assets/instagram-24.png" alt="Instagram - Senior Life SP"></a></li>
                    <li><a href="https://wa.me/5511999999999?text=Olá!+Gostaria+de+falar+sobre+seus+serviços" target="_blank"><img src="assets/whatsapp-24.png" alt="Whattsapp - Senior Life SP"></a></li>
                </ul>

                <div class="contato">
                    <a href="#form-contat">Fale conosco</a>
                </div>
            </nav>
        </div>
    </header>
