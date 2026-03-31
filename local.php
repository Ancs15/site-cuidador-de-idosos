<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$ok = 0;

/*email != ''*/
/*email é diferente de ''*/
if(isset($_POST['email'])){


  //Create an instance; passing `true` enables exceptions
  require 'vendor/phpmailer/PHPMailer.php';
  require 'vendor/phpmailer/SMTP.php';

  $mail = new PHPMailer(true);

  try {

      //Pegar informações do formulário
      $nome     =       $_POST["nome"];
      $email    =       $_POST["email"];
      $tele     =       $_POST['tele'];
      $mens     =       $_POST['mens'];

      // Banco de dados
      require_once('admin/controlecontato.php');

      $contato = new ClasseContato();

      $contato->nomeContato = $nome;
      $contato->emailContato = $email;
      $contato->foneContato = $tele;
      $contato->mensContato = $mens;

      $contato->Inserir();

      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'seniorlifesp@gmail.com';  //trocar esse email                     //SMTP username
      $mail->Password   = 'rvlccuezacmsoakz';              //trocar essa senha                 //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('seniorlifesp@gmail.com', 'Site Senior Life SP'); //trocar isso aqui
      $mail->addAddress('00001132664652sp@al.educacao.sp.gov.br'); //tem que trocar também     //Add a recipient
      // $mail->addAddress('ellen@example.com');               //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Site Senior Life SP';
      $mail->Body    = "
        Nome: $nome <br>
        E-Mail: $email <br>
        Telefone: $tele <br>
        Mensagem: $mens
      ";
      $mail->AltBody = "
        Nome: $nome \n
        E-Mail: $email \n
        Telefone: $tele \n
        Mensagem: $mens
      ";

      $mail->send();
      $ok = 1;
  } catch (Exception $e) {
      $ok = 2;
  }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Senior Life oferece cuidado profissional e acolhedor para idosos, oferecendo acompanhamento dedicado para garantir conforto, segurança e qualidade de vida.">
    
    <meta name="keywords" content="cuidador, cuidadora, cuidador de idosos, cuidados domiciliares, cuidadorSP, serviço de cuidador">

    <meta property="og:title" content="Senior Life SP">
    <meta property="og:description" content="A Senior Life oferece cuidado profissional e acolhedor para idosos, oferecendo acompanhamento dedicado para garantir conforto, segurança e qualidade de vida.">
    <meta property="og:image" content="">
    <meta property="og:type" content="website">

    <link rel="apple-touch-icon" sizes="57x57" href="assets/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icon/favicon-16x16.png">
    <link rel="manifest" href="assets/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">    


    <title>Senior Life SP</title>

    <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsivo.css">
</head>
<body>

    <?php require_once('conteudo/topo.php') ?>

    <main>
        <?php require_once('conteudo/banner.php') ?>

        <section class="wow padrao local animate__animated animate__fadeInUp">
            <div class="local-titulo">
              <hr>
              <h3>Local</h3>          
              <hr>      
            </div>
            <div class="contato-mapa">
              <div class="wow for-cards animate__animated animate__fadeInLeft" id="form-contat">
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
                          <textarea name="mens" cols="30" rows="10" placeholder="Insira sua dúvida aqui" required></textarea>
                      </div>
                      <button class="btn-for">Enviar</button>
                  </form>
              </div>
              <div class="wow mapa animate__animated animate__fadeInRight">
                <h5>Visite nosso Endereço!</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.0277219504574!2d-46.434433023790156!3d-23.495510959177935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce63dda7be6fb9%3A0xa74e7d5a53104311!2sSenac%20S%C3%A3o%20Miguel%20Paulista!5e0!3m2!1spt-BR!2sbr!4v1773949770682!5m2!1spt-BR!2sbr" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="localizacao">
                  <img src="assets/Senior-Life-logoverde.png" alt="Logo do Site - SeniorLifeSP">
                  <a href="https://maps.app.goo.gl/fLGcybcaQNgHAQNd6" target="_blank" rel="noopener noreferrer">Av. Marechal Tito 1500, São Miguel Paulista</a>
                </div>
              </div>
            </div>

        </section>    

        <a href="#" target="_blank" class="btn-whatsapp"><img src="assets/whatsapp-24.png" alt="Botão Flutuante Whatsapp"></a>
      </main>

    <?php require_once ('conteudo/rodape.php') ?>

    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"></script>
        
    <script src="js/slick.min.js"></script>

    <script src="js/wow.min.js"></script>

    <script src="js/script.js"></script>
</body>
</html>