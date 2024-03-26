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

<body class="telaPubli">
    <header class="cabecalho">
        
    <a href="{{route('dashboard')}}">
        <img href="{{ route('dashboard') }}" class="tamanho_logo" src="https://senachub.webapptech.cloud/public/imagens/LogoSenac.png" alt="Logo SenacHub">
    </a>            <form method="get" action="{{ route('profile.pesquisar') }}">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="inputcodigo" class="col-form-label cor_digite_nome">Digite o Nome</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="inputcodigo" name="name" class="form-control"
                            aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>

        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </nav>

    </header>

    <!-- Conteúdo do menu dropdown -->
    <div class="collapse lista-dropdown" id="navbarToggleExternalContent">
        <div class="p-4">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.pesquisar')}}">Amigos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.edit')}}">Configurações</a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link class="nav-link" :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Sair') }}</x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <style>
        
        .cor_digite_nome {
            color: #FFF;
        }
        .telaPubli {
            position: relative;
        }

        .telaPubli_main {
            position: absolute;
            top: 30%;
            left: 55%;
            transform: translate(-50%, -50%);
            width: 1153px;
            height: 394px;
        }

        .form-label {
            width: 140px;
        }

        .form-control {
            width: calc(90% - 10px);
            margin-right: 125px;
        }

        .upload-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .upload-container label {
            margin-right: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: flex-end;
            width: 89%;
            margin-top: 10px;
        }

        .btn-container button {
            margin-left: 10px;
            margin-bottom: 100px;
        }

        /**/

        .publicacao {
            width: calc(90% - 10px);
            margin-right: 125px;
            border: 1px solid #ccc;
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 16px;
        }

        .nome-usuario {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .mensagem {
            margin-bottom: 10px;
        }

        .botoes-like-dislike {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .botoes-like-dislike .btn-like {
            margin-right: 20px;
        }

        .botoes-like-dislike button {
            display: flex;
            align-items: center;
            margin-right: 10px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 12px;
            width: 20px;
            height: 20px;
            outline: none !important;
            box-shadow: none !important;
            border-color: transparent !important;
        }

        .btn-responder {
            background-color: #284065;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .editar-perfil {
            color: #E7E7E7;
            background-color: #284065;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border-radius: 4px;
            border: 1px solid #FFF;
            background: #1D1D1D;
        }

        .editar-perfil:hover {
            background-color: #1e3045;
        }

        .btn-responder:hover {
            background-color: #1e3045;
        }

        .publicacao {
            width: calc(90% - 10px);
            margin-right: 125px;
            border: 1px solid #ccc;
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 16px;
            border-radius: 10px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&display=swap');


        * {
            padding: 0;
            margin: 0;

        }


        /*TELA DE PUBLICAÇÃO*/

        .cabecalho {
            display: flex;
            height: 68px;
            padding: 8px 12px;
            justify-content: space-between;
            align-items: center;
            border-radius: 4px;
            border: 1px solid var(--Components-Card-Border, rgba(0, 0, 0, 0.17));
            background: #1D1D1D;
        }

        .tamanho_logo {
            width: 105px;
            height: 52px;
        }

        body {
            background: linear-gradient(180deg, #000 0%, #303030 100%);
            background-size: cover;
            background-attachment: fixed;
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
            /* LUCAS VAI ARRUMAR ISSO HOJE*/
            border-bottom: 1px solid var(--Components-Card-Border, rgba(0, 0, 0, 0.17));
            background: var(--Components-Card-Caption-Background, rgba(0, 0, 0, 0.03));
        }


        .perfil_img {
            width: 230px;
            height: 230px;
            object-fit: cover;
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
            padding: 8px 16px;
            color: #262626;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;


        }

        .font-custom {
            color: #FFF;
            text-align: center;
            font-family: Manrope, sans-serif;
            ;
            font-size: 16px;
            font-style: normal;
            font-weight: 800;

        }

        .h2 {
            color: #FFF;
            font-family: Manrope, sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%;
        }


        .p {
            color: #C9C9C9;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%; /* 19.2px */
        }

        .p2 {
            color: #C9C9C9;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%; /* 19.2px */
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
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */
            font-family: 'Manrope', sans-serif;
        }

        .padrao {
            position: absolute;
            top: 50%;
            left: 55%;
            width: 1153px;
            height: 394px;
            margin-top: 55px;
            /* Metade da altura do elemento */
            margin-left: -576.5px;
            /* Metade da largura do elemento */
        }


        .image_center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2%;
            margin-bottom: 2%;
            max-width: 100%;
            height: auto;
        }
        .info_perfil {
            display: flex;
            padding: 16px;
            flex-direction: column;
            align-items: flex-start;
            align-self: stretch;
            background: var(--HitBox, rgba(255, 255, 255, 0.00));
        }

        .h5 {
            color: #FFF;
            font-family: Manrope, sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%;
            /* 24px */
        }

        .msg_publi {
            color: #FFF;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */
        }

        .unidade_color {
            color: #FFF;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */
        }

        .opcoes ul li {
            color: white;
            /* Define a cor do texto como branco */
        }

        .btn_responder {
            color: #E7E7E7;
            background-color: #284065;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border: 1px solid #284065;
            border-radius: 4px;
            border: 1px solid #FFF;
            background: #1D1D1D;
        }

        .ver-mais-container button {
            border: none;
            /* Remove a borda do botão */
            background: none;
            /* Remove o fundo do botão, se houver */
            padding: 0;
            /* Remove o preenchimento interno do botão */
        }

        .tamanho_perfil {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background-color: #f0f0f0;
        }

        .tamanho_perfil img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }

        .removerlinha{
        color: inherit;
        text-decoration: none;

        }
        .cor_nao_tem_postagem{
            color: #FFF;
        }
        .custom-image-size {
        width: 230px;
        height: 230px;
        }
        

    </style>
    @yield('content2')

    </main>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
