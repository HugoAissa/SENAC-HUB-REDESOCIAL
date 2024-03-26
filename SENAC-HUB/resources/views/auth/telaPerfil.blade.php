<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/style.css">
    <title>SenacHub</title>
    <style>
        /* Estilos personalizados */
        .form-control {
            width: 300px;
            /* Definindo a largura do campo de pesquisa */
        }

        /* Ajuste para evitar que o texto 'Search' apareça abaixo do campo de pesquisa */
        .form-outline label {
            display: none;
        }

        /* Ajuste para o ícone de pesquisa ficar do mesmo tamanho do botão */
        .btn-primary .fas {
            font-size: 1rem;
            /* Tamanho do ícone igual ao tamanho do botão */
        }

        .input-group {
            display: flex;
            /* Altera o layout para flexível */
            flex-direction: row-reverse;
            /* Inverte a ordem dos elementos filhos */
        }

        .input-group .form-outline {
            order: 2;
            /* Define a ordem do campo de entrada para 2 */
        }

        .input-group .btn {
            order: 1;
            /* Define a ordem do botão de pesquisa para 1 */
        }

        .input-group .btn.btn-primary .fas.fa-search {
            color: #FFF;
            /* Defina a cor desejada para a lupa */
        }

        .input-group .btn.btn-primary {
            background: #1B1B1B;
            border-radius: 0px 3.2px 3.2px 0px;
            border: 1px solid #585858;
        }

        /* Estilo para o campo de entrada */
        .form-control {
            border-radius: 3.2px 0px 0px 3.2px;
            /* Borda arredondada apenas no lado esquerdo */
        }

        /* Estilo para o botão de pesquisa */
        .input-group .btn.btn-primary {
            border-radius: 0px 3.2px 3.2px 0px;
            /* Borda arredondada apenas no lado direito */
        }
        .banner{
            width: 1593px;
            height: 332px;
            display: flex;
            padding: 16px;
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-start;
            flex: 1 0 0;
            align-self: stretch;
            background: linear-gradient(90deg, #1B1B1B 0%, rgba(0, 0, 0, 0.00) 50.03%), url(<path-to-image>), lightgray 0.953px 0px / 99.88% 100% no-repeat;
            margin-left: -54px;
            margin-right: 45px;
        }
        .foto_perfil {
            display: flex;
            align-items: flex-start;
            /* Alinha os itens do flex-start */
        }
        .body_telaPerfil {
            background: linear-gradient(180deg, #1B1B1B 0%, #303030 100%);
            width: 100vw; /* largura total da viewport */
            height: 100vh; /* altura total da viewport */
        }
        .telaPubli_main {
            position: absolute;
            top: 75%;
            left: 55%;
            transform: translate(-76%, -70%);
            width: 1153px;
            height: 394px;
        }

        .form-control {
            width: calc(90% - 10px);
            margin-right: 125px;
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
        .h5{
            color: #FFF;
            font-family: Manrope, sans-serif;
            font-size: 20px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%;
          
        }
        .msg_publi{
            color: #FFF;
            font-family: Manrope, sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            /* 24px */ 
        }
    </style>
</head>

<body class="body_telaPerfil">
    <!-- CABEÇALHO -->
    <header class="cabecalho_tela_perfil">
        <img class="tamanho_logo" src="/Images/LogoSenac.png" alt="Logo SenacHub">
        <div class="input-group">
            <div id="search-autocomplete" class="form-outline" data-mdb-input-init>
                <input type="search" id="form1" class="form-control" />
            </div>
            <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                    <g clip-path="url(#clip0_247_2875)">
                        <path
                            d="M11.7417 10.8431C12.71 9.52181 13.1437 7.88361 12.956 6.25627C12.7683 4.62893 11.9731 3.13246 10.7294 2.06625C9.48579 1.00004 7.88543 0.442727 6.24851 0.505801C4.6116 0.568874 3.05886 1.24769 1.90095 2.40643C0.743029 3.56518 0.0653277 5.1184 0.00342583 6.75536C-0.058476 8.39231 0.499986 9.99228 1.56708 11.2352C2.63418 12.4781 4.13122 13.2722 5.7587 13.4587C7.38617 13.6452 9.02406 13.2104 10.3447 12.2411H10.3437C10.3737 12.2811 10.4057 12.3191 10.4417 12.3561L14.2917 16.2061C14.4792 16.3938 14.7336 16.4992 14.9988 16.4993C15.2641 16.4994 15.5185 16.3941 15.7062 16.2066C15.8938 16.0191 15.9993 15.7647 15.9994 15.4995C15.9995 15.2342 15.8942 14.9798 15.7067 14.7921L11.8567 10.9421C11.8209 10.9059 11.7825 10.8725 11.7417 10.8421V10.8431ZM11.9997 6.99912C11.9997 7.72139 11.8574 8.43659 11.581 9.10388C11.3046 9.77117 10.8995 10.3775 10.3888 10.8882C9.87804 11.3989 9.27173 11.8041 8.60444 12.0805C7.93715 12.3569 7.22195 12.4991 6.49968 12.4991C5.77741 12.4991 5.06221 12.3569 4.39492 12.0805C3.72763 11.8041 3.12131 11.3989 2.61059 10.8882C2.09987 10.3775 1.69474 9.77117 1.41834 9.10388C1.14194 8.43659 0.999677 7.72139 0.999677 6.99912C0.999677 5.54043 1.57914 4.14149 2.61059 3.11004C3.64204 2.07859 5.04099 1.49912 6.49968 1.49912C7.95837 1.49912 9.35731 2.07859 10.3888 3.11004C11.4202 4.14149 11.9997 5.54043 11.9997 6.99912Z"
                            fill="#F28C24" />
                    </g>
                    <defs>
                        <clipPath id="clip0_247_2875">
                            <rect width="16" height="16" fill="white" transform="translate(0 0.5)" />
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
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

    <!-- Conteúdo do corpo aqui -->
    <main>
        <!-- FOTO DE PERFIL -->
        <div class="foto_perfil">
            <div class="col-3" style="margin: 0 -45px;"> <!-- Adicionando margem de 45px -->
                <div class="rounded-1 d-flex justify-content-center">
                    <!-- Aqui está o SVG substituído -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="250" height="332" viewBox="0 0 250 375">
                        <!-- Substitua este conteúdo pelo desenho do seu ícone -->
                        <rect width="100%" height="100%" fill="#CCCCCC"/>
                        <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-size="48" fill="#FFFFFF">User</text>
                    </svg>
                    <!-- Fim do SVG substituído -->
                    <div class="square"></div>
                </div>
            </div>
            <div class="banner">
        
            </div>
        </div>
    </main>
    <div class="telaPubli_main">
        <h5 class="h5">Criar Publicação</h5>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
   
            <div class="mb-3">
                <label for="message" class="form-label msg_publi">Mensagem:</label>
                <textarea class="form-control" id="message" rows="7" name="content" required></textarea>
            </div>
            <div class="upload-container mb-3">
                <label for="photo" class="form-labell msg_publi">Upload de Fotos:</label>
                <input class="form-control" type="file" id="photo" name="image" accept="image/*">
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary editar-perfil">Publicar</button>
            </div>
        </form>
    </div>
    
    

    <!-- Scripts JavaScript do Bootstrap (opcional, dependendo do que você precisa) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
