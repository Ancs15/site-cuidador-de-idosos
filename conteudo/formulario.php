        <section class="padrao formulario">
            <div class="wow for-titulo animate__animated animate__fadeInLeft">
                <h3>Contato</h3>
                <img src="assets/Senior-Life-logoverde.png" alt="Logo - Senior Life SP">
                
            </div>
            <div class="wow for-cards animate__animated animate__fadeInRight" id="form-contat">
                <h3>
                    <?php
                    
                    if($ok == 1){
                        echo $nome . ", sua mensagem foi enviado com sucesso!";
                    }elseif($ok == 2){
                        echo $nome . ", não foi possivel enviar sua mensagem.";
                    }
                    
                    ?>
                </h3>
                <h5>Vamos começar com calma.<br>Como podemos lhe ajudar?</h5>
                <form action="#" method="post">
                    <div class="for-campos">
                        <img src="assets/foto-de-perfil-verde.png" alt="Ícone para nome">
                        <input type="text" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="for-campos">
                        <img src="assets/telefone.png" alt="Ícone para telefone">
                        <input type="tel" name="tele" placeholder="Telefone" required>
                    </div>
                    <div class="for-campos">
                        <img src="assets/email.png" alt="Ícone para email">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="for-assunto">
                        <textarea name="mens" cols="30" rows="10" placeholder="Insira sua dúvida aqui!" required></textarea>
                    </div>
                    <button class="btn-for">Enviar</button>
                </form>
            </div>
        </section>