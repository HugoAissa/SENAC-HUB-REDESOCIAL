<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://senachub.webapptech.cloud/public/imagens/SenacHub.ico">

    <title>SenacHub</title>

</head>

<body class="senachub_body_padrao">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&display=swap');


        * {
            padding: 0;
            margin: 0;

        }

        #capsLockMessage {
            color: red;
            display: none;
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s ease;
            margin-top: 0;
        }

        #capsLockMessage.active {
            opacity: 1;
        }

        #capsLockMessage1 {
            color: red;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        #capsLockMessage1.active {
            opacity: 1;
        }

        #elemento-abaixo-do-capslock {
            margin-bottom: -0px;
        }


        .senachub_check_termos {
            color: #FFF;
            padding: 6px 12px;
            font-weight: 400;
            font-family: 'Manrope', sans-serif;
            width: 360px;
            height: 38px;
            margin: 0 auto;
            display: block;
            margin-top: 50px;
        }



        .senachub_body_padrao {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(110deg, #000 0%, #2E2E2E 54.5%, #555 100%);
            flex-shrink: 0;
        }

        /*ESQUECI SENHA*/
        .espaco-subtitulo {
            margin-bottom: -60px;
        }

        .input_redefinir_senha {
            margin-bottom: -20px;
        }

        .btn_redefinir_senha {
            margin-top: -20px;
        }


        .senachub_borda_esqueci_senha {
            width: 412px;
            height: 670px;
            flex-shrink: 0;
            border-radius: 25px;
            border: 1px solid #FFF;
        }

        .senachub_input_esqueci_senha {
            color: #E7E7E7;
            padding: 6px 12px;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            width: 360px;
            height: 38px;
            margin: 0 auto;
            display: block;
            margin-top: 40px;
        }

        .text_capslock {
            color: red;
            text-align: center;
        }

        /*PARTE DO CADASTRO2*/
        /*PARTE DO CADASTRO*/

        .senachub_borda_cadastro {
            border-radius: 25px;
            width: 412px;
            height: 765px;
            flex-shrink: 0;
            border: 1px solid #FFF;
        }

        .senachub_tamanho_email_cadastro {
            display: flex;
            margin-bottom: 10px;
        }


        .senachub_tamanho_email_cadastro::after {
            content: " *";
            color: red;
        }

        .senachub_email_cadastro {
            display: flex;
            margin-bottom: 10px;
        }

        .senachub_button_criar_conta {
            color: #E7E7E7;
            padding: 6px 12px;
            background-color: #284065;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border-radius: 4px;
            border: 1px solid #284065;
            width: 336px;
            height: 38px;
            margin: 0 auto;
            display: block;
        }

        .senachub_button_tela_login {
            color: #E7E7E7;
            padding: 6px 12px;
            background-color: #284065;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border: 1px solid #284065;
            width: 336px;
            height: 38px;
            margin: 0 auto;
            display: block;
            border-radius: 4px;
            border: 1px solid #FFF;
            background: #1D1D1D;
        }


        .senachub_input_usuario {
            color: #E7E7E7;
            padding: 6px 12px;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border-radius: 4px;
            width: 360px;
            height: 38px;
            margin: 0 auto;
            display: block;
        }

        .senachub_input_todos {
            color: #E7E7E7;
            padding: 6px 12px;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border-radius: 4px;
            width: 360px;
            height: 38px;
            margin: 0 auto;
            display: block;
            margin-top: 40px;
        }

        /*PARTE DO LOGIN*/

        .senachub_header {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            align-self: stretch;
        }


        .senachub_input_email {
            display: flex;
            padding-bottom: 16px;
            flex-direction: column;
            align-items: flex-start;
            align-self: stretch;
        }

        .senachub_borda_login {
            border-radius: 25px;
            text-align: center;
            border: 1px solid #FFF;
            width: 412px;
            height: 550px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .senachub_tamanho_logo {
            width: 137px;
            height: 68px;
        }

        .senachub_tamanho_titulo_login {
            color: #FFF;
            font-family: Manrope;
            font-size: 32px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%;
            /* 38.4px */
            color: #FFFFFF;
            font-family: 'Manrope', sans-serif;
        }

        .senachub_tamanho_subtitulo {
            color: #E7E7E7;
            font-family: Manrope;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */
            font-family: 'Manrope', sans-serif;
        }


        .senachub_tamanho_email {
            display: flex;
            padding-bottom: 8px;
            gap: 4px;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            font-family: 'Manrope', sans-serif;
            color: #E7E7E7;
        }

        .senachub_tamanho_senha {
            display: flex;
            padding-bottom: 8px;
            font-family: 'Manrope', sans-serif;
        }

        .senac_input_style {
            margin-bottom: 15px;
            color: #E7E7E7;
            font-family: 'Manrope', sans-serif;
        }

        .senachub_check {
            margin-top: 8px;
            margin-bottom: 8px;
            color: #E7E7E7;
            display: flex;
            font-weight: 400;
            font-family: 'Manrope', sans-serif;
            display: flex;
            padding-bottom: 8px;
            align-items: center;
            align-self: stretch;
        }


        .senachub_esqueci_senha {
            margin-left: 75px;
            color: #E7E7E7;
            text-decoration-line: underline;
        }

        .senachub_cor_lembrar_De_mim {
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;

        }

        .senachub_button_entrar {
            color: #E7E7E7;
            padding: 6px 12px;
            background-color: #284065;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border-radius: 4px;
            border: 1px solid #284065;
            width: 360px;
            height: 38px;
        }

        .senachub_nao_tem_conta {
            color: #E7E7E7;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */
        }


        .senachub_crie_aqui {
            color: #E7E7E7;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */
            text-decoration-line: underline;
        }

        .nao_tem_conta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
            align-self: stretch;
            margin-top: 30px;
        }

        .espaco_subtitulo_login {
            margin-bottom: -30px;
        }

        .input_check_login {
            margin-left: 15px;
            margin-top: 60px;
        }

        /*TELA DE PUBLICAÇÃO*/

        .cabecalho {
            display: flex;
            height: 68px;
            padding: 8px 12px;
            justify-content: space-between;
            /* Alinha os itens no começo e no final */
            align-items: center;
            /* Centraliza verticalmente */
            background: #003950;
        }

        .tamanho_logo {
            width: 105px;
            height: 52px;
        }

        body {
            background-color: #E6E6E6;
        }

        .lista-dropdown {
            background-color: white;
            position: absolute;
            right: 0;
            width: 200px;
            border: 1px solid #ccc;
            border-top: none;

        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="orange" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M4 18h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zm0-5h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zM3 7c0 .55.45 1 1 1h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1z"/></svg>');
        }

        .body_padrao_tela_publi {
            display: flex;
            width: 300px;
            height: 865px;
            flex-direction: column;
            flex-shrink: 0;
            border-radius: 4px;
            border: 1px solid var(--Components-Card-Border, rgba(0, 0, 0, 0.17));
            background: var(--Gray-White, #FFF);
        }


        .info_perfil {
            display: flex;
            padding: 16px;
            flex-direction: column;
            align-items: flex-start;
            align-self: stretch;
            background: var(--HitBox, rgba(255, 255, 255, 0.00));
        }

        .perfil_img {
            width: 230px;
            height: 230px;
            object-fit: cover;
            /* Garante que a imagem seja redimensionada e cortada para caber no contêiner */
        }

        .opcoes {
            display: flex;
            padding: 8px 8px;
            align-items: center;
            gap: 4px;
            align-self: stretch;
            background: var(--HitBox, rgba(255, 255, 255, 0.00));
            display: flex;
            align-items: center;
            align-self: stretch;
        }

        .opcoes ul {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 8px 24px;
            color: #262626;
            font-family: Manrope;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;

        }

        .font-custom {
            color: var(--Body-Text-Body-Color, #212529);
            text-align: center;
            font-family: Manrope;
            font-size: 16px;
            font-style: normal;
            font-weight: 800;

        }

        .h2 {
            color: var(--Body-Text-Body-Color, #212529);
            font-family: Manrope;
            font-size: 20px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%;
        }

        .p {
            color: var(--Gray-600, #6C757D);
            font-family: Manrope;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%;
        }

        .p2 {
            color: var(--Body-Text-Body-Color, #212529);
            font-family: Manrope;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
        }

        .senachub_body_incio {
            background: linear-gradient(180deg, #003950 0%, rgba(0, 83, 156, 0.65) 54.5%, rgba(7, 85, 157, 0.00) 100%);
        }

        .tamanho_logo_senac {
            width: 616px;
            height: 306px;
            flex-shrink: 0;
        }

        .senachub_inicio {
            border: 1px solid #ccc;
            padding: 20px;
            display: flex;
            align-items: center;
            display: flex;
            flex-direction: column;
        }


        .tamanho_logo_senac {
            width: 616px;
            height: 306px;
            flex-shrink: 0;
            margin-left: 100px;
        }

        .senachub_inicio {
            border: 1px solid #ccc;
            padding: 20px;
            margin-right: 100px;
        }

        .senachub_entrar_inicio {
            color: #FFF;
            font-family: Manrope;
            font-size: 32px;
            font-style: normal;
            font-weight: 500;
            font-family: 'Manrope', sans-serif;
        }


        .senachub_tamanho_bem_vindo {
            color: #E7E7E7;
            font-family: Manrope;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */
            font-family: 'Manrope', sans-serif;
        }

        .senachub_inicio {
            width: 412px;
            height: 349px;
            flex-shrink: 0;
            border-radius: 25px;
            border: 1px solid #FFF;
            display: flex;
            justify-content: space-between;
        }
    </style>
    @yield('content')

    </main>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
