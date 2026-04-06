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
    
        <section class="sobre">
            <div class="cuidadora">
                <div class="retrato-cuidadora">
                    <img src="#" alt="Portrato da Cuidadora - Senior Life SP">
                </div>

                <div class="info-cuidadora">
                    <h2>Nome</h2>
                    <h3>Subtítulo</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae turpis ex. Aliquam at metus sit amet nibh consequat congue. Pellentesque placerat dolor mi, nec efficitur odio tempus eu. Nullam vel erat lobortis leo mollis aliquam. Nunc id mauris id nisl varius cursus a at est. Maecenas eget diam lacinia, convallis arcu ut, imperdiet ligula. Integer sapien mauris, commodo vitae augue id, eleifend iaculis turpis. Sed et turpis id justo iaculis iaculis. Nullam tristique leo pharetra, dapibus dui sodales, luctus neque. Nunc feugiat porta velit, consequat imperdiet elit tempor ut. Maecenas vel est non ligula eleifend suscipit ac ac lorem. Mauris lacinia dolor vel sollicitudin pellentesque. Nulla ultrices vel eros in blandit. Nam sollicitudin orci nulla, posuere volutpat nulla sollicitudin vitae.Mauris fringilla sapien mi, at ultricies nisl imperdiet at. Sed bibendum sit amet</p>
                </div>
            </div>

            <div class="experiencias">
                <div class="info-exp">
                    <h2>Título</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae turpis ex. Aliquam at metus sit amet nibh consequat congue. Pellentesque placerat dolor mi, nec efficitur odio tempus eu. Nullam vel erat lobortis leo mollis aliquam. Nunc id mauris id nisl varius cursus a at est. Maecenas eget diam lacinia, convallis arcu ut, imperdiet ligula. Integer sapien mauris, commodo vitae augue id, eleifend iaculis turpis. Sed et turpis id justo iaculis iaculis. Nullam tristique leo pharetra, dapibus dui sodales, luctus neque. Nunc feugiat porta velit, consequat imperdiet elit tempor ut. Maecenas vel est non ligula eleifend suscipit ac ac lorem. Mauris lacinia dolor vel sollicitudin pellentesque. Nulla ultrices vel eros in blandit. Nam sollicitudin orci nulla, posuere volutpat nulla sollicitudin vitae.Mauris fringilla sapien mi, at ultricies nisl imperdiet at. Sed bibendum sit amet</p>
                </div>

                <div class="imagem-exp">
                    <img src="#" alt="Representação Experiência - Senior Life SP">
                </div>
            </div>
            
            <hr> <!-- Fôlego visual -->

            <?php require_once('conteudo/diferencial.php') ?>

            <hr> <!-- Fôlego visual -->

            <div class="cta-sobre">
                <div>
                    <h2>Teste...</h2>
                    <h3>Teste...</h3>
                    <ul>
                        <li>
                            <p></p>
                        </li>
                        <li>
                            <p></p>
                        </li>
                        <li>
                            <p></p>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3>Deseja conversar para entender mais sobre o processo?</h3>
                    <a href="#">Falar por WhatsApp</a>
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