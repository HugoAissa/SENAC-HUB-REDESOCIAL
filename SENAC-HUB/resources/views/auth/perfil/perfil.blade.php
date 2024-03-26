<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://senachub.webapptech.cloud/public/imagens/SenacHub.ico">

    <title>SenacHub</title>


    <style>
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="orange" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M4 18h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zm0-5h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1s.45 1 1 1zM3 7c0 .55.45 1 1 1h16c.55 0 1-.45 1-1s-.45-1-1-1H4c-.55 0-1 .45-1 1z"/></svg>');
        }

        .lista-dropdown {
            background-color: white;
            position: absolute;
            right: 0;
            width: 200px;
            border: 1px solid #ccc;
            border-top: none;

        }

        .cabecalho {
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            height: 68px;
            padding: 8px 12px;
            justify-content: space-between;
            align-items: center;
            border-radius: 4px;
            border: 1px solid var(--Components-Card-Border, rgba(0, 0, 0, 0.17));
            background: #1D1D1D;

        }

        body {


            min-height: 100vh;
            margin: 0;

            background: linear-gradient(110deg, #000 0%, #2E2E2E 54.5%, #555 100%);
            flex-shrink: 0;

        }

        .profile-header {
            position: relative;
            overflow: hidden
        }

        .profile-header .profile-header-cover {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0
        }

        .profile-header .profile-header-cover:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, .75) 100%)
        }

        .profile-header .profile-header-content {
            color: #fff;
            padding: 25px
        }

        .profile-header-img {
            float: left;
            width: 120px;
            height: 120px;
            border-radius: 4px;
        }

        .profile-header-img img {
            max-width: 100%
        }

        .profile-header-info h4 {
            font-weight: 500;
            color: #fff
        }

        .profile-header-img+.profile-header-info {
            margin-left: 140px
        }

        .profile-header .profile-header-content,
        .profile-header .profile-header-tab {
            position: relative
        }

        .b-minus-1,
        .b-minus-10,
        .b-minus-2,
        .b-minus-3,
        .b-minus-4,
        .b-minus-5,
        .b-minus-6,
        .b-minus-7,
        .b-minus-8,
        .b-minus-9,
        .b-plus-1,
        .b-plus-10,
        .b-plus-2,
        .b-plus-3,
        .b-plus-4,
        .b-plus-5,
        .b-plus-6,
        .b-plus-7,
        .b-plus-8,
        .b-plus-9,
        .l-minus-1,
        .l-minus-2,
        .l-minus-3,
        .l-minus-4,
        .l-minus-5,
        .l-minus-6,
        .l-minus-7,
        .l-minus-8,
        .l-minus-9,
        .l-plus-1,
        .l-plus-10,
        .l-plus-2,
        .l-plus-3,
        .l-plus-4,
        .l-plus-5,
        .l-plus-6,
        .l-plus-7,
        .l-plus-8,
        .l-plus-9,
        .r-minus-1,
        .r-minus-10,
        .r-minus-2,
        .r-minus-3,
        .r-minus-4,
        .r-minus-5,
        .r-minus-6,
        .r-minus-7,
        .r-minus-8,
        .r-minus-9,
        .r-plus-1,
        .r-plus-10,
        .r-plus-2,
        .r-plus-3,
        .r-plus-4,
        .r-plus-5,
        .r-plus-6,
        .r-plus-7,
        .r-plus-8,
        .r-plus-9,
        .t-minus-1,
        .t-minus-10,
        .t-minus-2,
        .t-minus-3,
        .t-minus-4,
        .t-minus-5,
        .t-minus-6,
        .t-minus-7,
        .t-minus-8,
        .t-minus-9,
        .t-plus-1,
        .t-plus-10,
        .t-plus-2,
        .t-plus-3,
        .t-plus-4,
        .t-plus-5,
        .t-plus-6,
        .t-plus-7,
        .t-plus-8,
        .t-plus-9 {
            position: relative !important
        }

        .profile-header .profile-header-tab {
            background: #fff;
            list-style-type: none;
            margin: -10px 0 0;
            padding: 0 0 0 140px;
            white-space: nowrap;
            border-radius: 0
        }

        .text-ellipsis,
        .text-nowrap {
            white-space: nowrap !important
        }

        .profile-header .profile-header-tab>li {
            display: inline-block;
            margin: 0
        }

        .profile-header .profile-header-tab>li>a {
            display: block;
            color: #929ba1;
            line-height: 20px;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: 700;
            font-size: 12px;
            border: none
        }

        .profile-header .profile-header-tab>li.active>a,
        .profile-header .profile-header-tab>li>a.active {
            color: #242a30
        }

        .profile-content {
            padding: 25px;
            border-radius: 4px
        }

        .profile-content:after,
        .profile-content:before {
            content: '';
            display: table;
            clear: both
        }

        .profile-content .tab-content,
        .profile-content .tab-pane {
            background: 0 0
        }

        .profile-left {
            width: 200px;
            float: left
        }

        .profile-right {
            margin-left: 240px;
            padding-right: 20px
        }

        .profile-image {
            height: 175px;
            line-height: 175px;
            text-align: center;
            font-size: 72px;
            margin-bottom: 10px;
            border: 2px solid #E2E7EB;
            overflow: hidden;
            border-radius: 4px
        }

        .profile-image img {
            display: block;
            max-width: 100%
        }

        .profile-highlight {
            padding: 12px 15px;
            background: #FEFDE1;
            border-radius: 4px
        }

        .profile-highlight h4 {
            margin: 0 0 7px;
            font-size: 12px;
            font-weight: 700
        }

        .table.table-profile>thead>tr>th {
            border-bottom: none !important
        }

        .table.table-profile>thead>tr>th h4 {
            font-size: 20px;
            margin-top: 0
        }

        .table.table-profile>thead>tr>th h4 small {
            display: block;
            font-size: 12px;
            font-weight: 400;
            margin-top: 5px
        }

        .table.table-profile>tbody>tr>td,
        .table.table-profile>thead>tr>th {
            border: none;
            padding-top: 7px;
            padding-bottom: 7px;
            color: #242a30;
            background: 0 0
        }

        .table.table-profile>tbody>tr>td.field {
            width: 20%;
            text-align: right;
            font-weight: 600;
            color: #2d353c
        }

        .table.table-profile>tbody>tr.highlight>td {
            border-top: 1px solid #b9c3ca;
            border-bottom: 1px solid #b9c3ca
        }

        .table.table-profile>tbody>tr.divider>td {
            padding: 0 !important;
            height: 10px
        }

        .profile-section+.profile-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #b9c3ca
        }

        .profile-section:after,
        .profile-section:before {
            content: '';
            display: table;
            clear: both
        }

        .profile-section .title {
            font-size: 20px;
            margin: 0 0 15px
        }

        .profile-section .title small {
            font-weight: 400
        }

        body.flat-black {
            background: #E7E7E7
        }

        .flat-black .navbar.navbar-inverse {
            background: #212121
        }

        .flat-black .navbar.navbar-inverse .navbar-form .form-control {
            background: #4a4a4a;
            border-color: #4a4a4a
        }

        .flat-black .sidebar,
        .flat-black .sidebar-bg {
            background: #3A3A3A
        }

        .flat-black .page-with-light-sidebar .sidebar,
        .flat-black .page-with-light-sidebar .sidebar-bg {
            background: #fff
        }

        .flat-black .sidebar .nav>li>a {
            color: #b2b2b2
        }

        .flat-black .sidebar.sidebar-grid .nav>li>a {
            border-bottom: 1px solid #474747;
            border-top: 1px solid #474747
        }

        .flat-black .sidebar .active .sub-menu>li.active>a,
        .flat-black .sidebar .nav>li.active>a,
        .flat-black .sidebar .nav>li>a:focus,
        .flat-black .sidebar .nav>li>a:hover,
        .flat-black .sidebar .sub-menu>li>a:focus,
        .flat-black .sidebar .sub-menu>li>a:hover,
        .sidebar .nav>li.nav-profile>a {
            color: #fff
        }

        .flat-black .sidebar .sub-menu>li>a,
        .flat-black .sidebar .sub-menu>li>a:before {
            color: #999
        }

        .flat-black .page-with-light-sidebar .sidebar .active .sub-menu>li.active>a,
        .flat-black .page-with-light-sidebar .sidebar .active .sub-menu>li.active>a:focus,
        .flat-black .page-with-light-sidebar .sidebar .active .sub-menu>li.active>a:hover,
        .flat-black .page-with-light-sidebar .sidebar .nav>li.active>a,
        .flat-black .page-with-light-sidebar .sidebar .nav>li.active>a:focus,
        .flat-black .page-with-light-sidebar .sidebar .nav>li.active>a:hover {
            color: #000
        }

        .flat-black .page-sidebar-minified .sidebar .nav>li.has-sub:focus>a,
        .flat-black .page-sidebar-minified .sidebar .nav>li.has-sub:hover>a {
            background: #323232
        }

        .flat-black .page-sidebar-minified .sidebar .nav li.has-sub>.sub-menu,
        .flat-black .sidebar .nav>li.active>a,
        .flat-black .sidebar .nav>li.active>a:focus,
        .flat-black .sidebar .nav>li.active>a:hover,
        .flat-black .sidebar .nav>li.nav-profile,
        .flat-black .sidebar .sub-menu>li.has-sub>a:before,
        .flat-black .sidebar .sub-menu>li:before,
        .flat-black .sidebar .sub-menu>li>a:after {
            background: #2A2A2A
        }

        .flat-black .page-sidebar-minified .sidebar .sub-menu>li:before,
        .flat-black .page-sidebar-minified .sidebar .sub-menu>li>a:after {
            background: #3e3e3e
        }

        .flat-black .sidebar .nav>li.nav-profile .cover.with-shadow:before {
            background: rgba(42, 42, 42, .75)
        }

        .bg-white {
            background-color: #fff !important;
        }

        .p-10 {
            padding: 10px !important;
        }

        .media.media-xs .media-object {
            width: 32px;
        }

        .m-b-2 {
            margin-bottom: 2px !important;
        }

        .media>.media-left,
        .media>.pull-left {
            padding-right: 15px;
        }

        .media-body,
        .media-left,
        .media-right {
            display: table-cell;
            vertical-align: top;
        }

        select.form-control:not([size]):not([multiple]) {
            height: 34px;
        }

        .form-control.input-inline {
            display: inline;
            width: auto;
            padding: 0 7px;
        }


        .timeline {
            list-style-type: none;
            margin: 0;
            padding: 0;
            position: relative
        }

        .timeline:before {
            content: '';
            position: absolute;
            top: 5px;
            bottom: 5px;
            width: 5px;
            background: #2d353c;
            left: 20%;
            margin-left: -2.5px
        }

        .timeline>li {
            position: relative;
            min-height: 50px;
            padding: 20px 0
        }

        .timeline .timeline-time {
            position: absolute;
            left: 0;
            width: 18%;
            text-align: right;
            top: 30px
        }

        .timeline .timeline-time .date,
        .timeline .timeline-time .time {
            display: block;
            font-weight: 600
        }

        .timeline .timeline-time .date {
            line-height: 16px;
            font-size: 12px
        }

        .timeline .timeline-time .time {
            line-height: 24px;
            font-size: 20px;
            color: #242a30
        }

        .timeline .timeline-icon {
            left: 15%;
            position: absolute;
            width: 10%;
            text-align: center;
            top: 40px
        }

        .timeline .timeline-icon a {
            text-decoration: none;
            width: 20px;
            height: 20px;
            display: inline-block;
            border-radius: 20px;
            background: #d9e0e7;
            line-height: 10px;
            color: #fff;
            font-size: 14px;
            border: 5px solid #2d353c;
            transition: border-color .2s linear
        }

        .timeline .timeline-body {
            margin-left: 23%;
            margin-right: 17%;
            background: #fff;
            position: relative;
            padding: 20px 25px;
            border-radius: 6px
        }

        .timeline .timeline-body:before {
            content: '';
            display: block;
            position: absolute;
            border: 10px solid transparent;
            border-right-color: #fff;
            left: -20px;
            top: 20px
        }

        .timeline .timeline-body>div+div {
            margin-top: 15px
        }

        .timeline .timeline-body>div+div:last-child {
            margin-bottom: -20px;
            padding-bottom: 20px;
            border-radius: 0 0 6px 6px
        }

        .timeline-header {
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e7eb;
            line-height: 30px
        }

        .timeline-header .userimage {
            float: left;
            width: 34px;
            height: 34px;
            border-radius: 40px;
            overflow: hidden;
            margin: -2px 10px -2px 0
        }

        .timeline-header .username {
            font-size: 16px;
            font-weight: 600
        }

        .timeline-header .username,
        .timeline-header .username a {
            color: #2d353c
        }

        .timeline img {
            max-width: 100%;
            display: block
        }

        .timeline-content {
            letter-spacing: .25px;
            line-height: 18px;
            font-size: 13px
        }

        .timeline-content:after,
        .timeline-content:before {
            content: '';
            display: table;
            clear: both
        }

        .timeline-title {
            margin-top: 0
        }

        .timeline-footer {
            background: #fff;
            border-top: 1px solid #e2e7ec;
            padding-top: 15px
        }

        .timeline-footer a:not(.btn) {
            color: #575d63
        }

        .timeline-footer a:not(.btn):focus,
        .timeline-footer a:not(.btn):hover {
            color: #2d353c
        }

        .timeline-likes {
            color: #6d767f;
            font-weight: 600;
            font-size: 12px
        }

        .timeline-likes .stats-right {
            float: right
        }

        .timeline-likes .stats-total {
            display: inline-block;
            line-height: 20px
        }

        .timeline-likes .stats-icon {
            float: left;
            margin-right: 5px;
            font-size: 9px
        }

        .timeline-likes .stats-icon+.stats-icon {
            margin-left: -2px
        }

        .timeline-likes .stats-text {
            line-height: 20px
        }

        .timeline-likes .stats-text+.stats-text {
            margin-left: 15px
        }

        .timeline-comment-box {
            background: #f2f3f4;
            margin-left: -25px;
            margin-right: -25px;
            padding: 20px 25px
        }

        .timeline-comment-box .user {
            float: left;
            width: 34px;
            height: 34px;
            overflow: hidden;
            border-radius: 50%;
        }

        .timeline-comment-box .user img {
            width: 100%;
            height: auto;
        }

        .timeline-comment-box .user img {
            max-width: 100%;
            max-height: 100%
        }

        .timeline-comment-box .user+.input {
            margin-left: 44px
        }

        .lead {
            margin-bottom: 20px;
            font-size: 21px;
            font-weight: 300;
            line-height: 1.4;
        }

        .text-danger,
        .text-red {
            color: #ff5b57 !important;
        }

        /*DAQUI PRA BAIXO E DESING*/

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

        .publicacao {
            width: calc(95% - 1px);
            margin-right: 125px;
            border: 1px solid #ccc;
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 16px;
            border-radius: 10px;
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

        .nome-usuario {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .mensagem {
            color: #black;
            font-family: Manrope, sans-serif;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
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

        .btn_comentar {
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

        .btn_comentar:hover,
        .btn_comentar:active {
            background-color: #343a40;
        }

        .postado {
            color: var(--Gray-500, #ADB5BD);
            font-family: Manrope, sans-serif;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
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

        .btn_ler_comentario {
            background-color: transparent;
            border: none;
            outline: none;
            color: black;
            cursor: pointer;
        }


        .tamanho_logo {
            width: 105px;
            height: 52px;
        }

        .cor_nao_tem_postagem {
            color: #FFF;
        }
    </style>

</head>

<body>
    @extends('default/navbar')
    @section('navbar')
    <br>
    <br>
    <br> <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="content" class="content content-full-width">
                    <!-- begin profile -->
                    <div class="profile">
                        <div class="profile-header">
                            <!-- BEGIN profile-header-cover -->
                            <div class="profile-header-cover">
                                @if ($user->image_link_user_banner)
                                <img width="1316px" height="200.8" src="{{ $user->image_link_user_banner }}" alt="">

                                @else
                                <img src="https://senachub.webapptech.cloud/public/imagens/bg.jpg" alt="Imagem avatar SVG">


                                @endif
                            </div>
                            <!-- END profile-header-cover -->
                            <!-- BEGIN profile-header-content -->
                            <div class="profile-header-content">
                                <!-- BEGIN profile-header-img -->
                                <div class="profile-header-img">
                                    @if ($user->image_link_user)
                                    <img width="120" height="120" class="profile-header-img" src="{{ $user->image_link_user }}" alt="">
                                    @else
                                    <img src="https://senachub.webapptech.cloud/public/imagens/avatar.svg" alt="Imagem avatar SVG">
                                    @endif
                                </div>
                                <!-- END profile-header-img -->
                                <!-- BEGIN profile-header-info -->
                                <div class="profile-header-info">
                                    <h4 class="m-t-10 m-b-5">{{ $user->name }}</h4>
                                    <p class="m-b-10">{{$user->bio}}</p>
                                    <p class="m-b-10">{{ $user->unidade }}</p>
                                    @if (auth()->check())
                                    @php
                                    $userId = Auth::user()->id;
                                    $idDesejado = $user->id;
                                    @endphp
                                    @if ($userId == $idDesejado)
                                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-info editar-perfil">Editar Perfil</a>
                                    <br>
                                    <br>
                                    <br>

                                    @else
                                    <br>

                                    <br>
                                        @endif

                                    @unless(auth()->check() && auth()->user()->id == $user->id)
                                    <form id="sendFriendRequestForm{{ $user->id }}" action="{{ route('send-friend-request', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-info editar-perfil" type="submit" onclick="sendFriendRequest(event, {{ $user->id }})">Enviar Solicitação</button>
                                    </form>
                                    @endunless
                                    
                                    @else
                                    
                                    <script>
                                        window.location = "{{ route('login') }}";
                                    </script>
                                    @endif
                                </div>
                                <!-- END profile-header-info -->
                            </div>
                            <!-- END profile-header-content -->
                            <!-- BEGIN profile-header-tab -->
                            <ul class="profile-header-tab nav nav-tabs">
                                <li class="nav-item"><a href="" target="__blank" class="nav-link_ active show">POSTS</a></li>
                                <li class="nav-item"><a href="" target="__blank" class="nav-link_">SOBRE</a></li>
                                <li class="nav-item"><a href="" target="__blank" class="nav-link_">FOTOS</a></li>
                                <li class="nav-item"><a href="" target="__blank" class="nav-link_">VIDEOS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('view-amigos', ['userId' => $user->id]) }}" class="nav-link">AMIGOS</a>


                                </li>
                            </ul>
                            <!-- END profile-header-tab -->
                        </div>
                    </div>
                    <!-- end profile -->
                    <!-- begin profile-content -->
                    <div class="profile-content">
                        <!-- begin tab-content -->
                        <div class="tab-content p-0">
                            <!-- begin #profile-post tab -->
                            @php
                            $userId = $user->id;
                            $userPosts = App\Models\Post::where('user_id', $userId)->get();
                            @endphp
                            @if ($userPosts->count() > 0)
                            <ul>
                                @foreach ($userPosts->reverse() as $post)
                                <div>
                                    <!-- Conteúdo da publicação -->
                                    <div class="publicacao">
                                        <!-- Nome do usuário que fez a publicação -->
                                        @if ($post->user->image_link_user)
                                        <img class="tamanho_perfil" src="{{ $post->user->image_link_user }}" alt="Imagem de Perfil">
                                        @else
                                        <img class="tamanho_perfil" src="https://senachub.webapptech.cloud/public/imagens/avatar.svg" alt="Imagem avatar SVG">
                                        @endif
                                        <div class="nome-usuario">{{ $post->user->usuario }}</div>
                                        <!-- Mensagem da publicação -->
                                        <div class="mensagem">{{ $post->content }}</div>
                                        @if ($post->image_link)
                                        <img class="image_center" src="{{ $post->image_link }}" alt="Imagem do post">
                                        @endif
                                        <div class="card-footer postado">
                                            Postado em: {{ $post->created_at->format('H:i:s') }}
                                        </div>
                                        <!-- Botões de like e dislike -->
                                        <div class="botoes-like-dislike">
                                            <button type="button" class="btn-like" onclick="aumentarLikes()"><i class="bi bi-hand-thumbs-up" style="font-size: 15px;"></i>
                                                <span class="contador-likes" id="likes">0</span></button>
                                            <button type="button" class="btn-dislike" onclick="aumentarDislikes()"><i class="bi bi-hand-thumbs-down" style="font-size: 15px;"></i> <span class="contador-likes" id="dislikes">0</span></button>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary btn_comentar" data-bs-toggle="modal" data-bs-target="#replyModal2{{ $post->id }}">Comentar</button>
                                        </div>
                                        <div class="modal fade" id="replyModal2{{ $post->id }}" tabindex="-1" aria-labelledby="replyModalLabel{{ $post->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="replyModalLabel{{ $post->id }}">Responder
                                                            Postagem</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('posts.reply.store', $post->id) }}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="replyContent{{ $post->id }}" class="form-label">Sua Resposta</label>
                                                                <textarea class="form-control" id="replyContent{{ $post->id }}" name="content" rows="3"></textarea>
                                                            </div>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                            <button type="submit" class="btn btn-primary">Comentar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ver-mais-container">
                                            <button class="btn_ler_comentario" type="text" onclick="toggleRespostas(this)">
                                                Ler Comentários
                                            </button>
                                            <div style="display: none;">
                                                <!-- Aqui serão exibidas as respostas -->
                                                @if ($post->replies()->exists())
                                                @foreach ($post->replies->reverse() as $reply)
                                                <div class="card mt-2">
                                                    <div class="card-body">
                                                        @if ($reply->user->image_link_user)
                                                        <img class="tamanho_perfil" src="{{ $reply->user->image_link_user }}" alt="Imagem de Perfil">
                                                        @else
                                                        <img src="https://senachub.webapptech.cloud/public/imagens/avatar.svg" alt="Imagem avatar SVG">
                                                        @endif
                                                        <div class="card-body">
                                                            <strong>Respondido por:</strong>
                                                            {{ $reply->user->usuario }}<br>
                                                            <strong>Resposta:</strong>
                                                            {{ $reply->content }}<br>
                                                            <strong>Respondido em:</strong>
                                                            {{ $reply->created_at->format('d/m/Y H:i:s') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </ul>
                            @else
                            <p class="cor_nao_tem_postagem">O usuário não tem postagens.</p>
                            @endif
                        </div>
                        <script>
                            // Inicializa os toasts após o carregamento do DOM
                            document.addEventListener('DOMContentLoaded', function() {
                                var toasts = document.querySelectorAll('.toast');
                                var toastList = Array.from(toasts).map(function(toast) {
                                    return new bootstrap.Toast(toast);
                                });
                                toastList.forEach(function(toast) {
                                    toast.show();
                                });
                            });
                        </script>
                        @if ($errors->any())
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            @foreach ($errors->all() as $error)
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                                <div class="toast-header">
                                    <strong class="me-auto">SenacHub</strong>
                                    <small class="text-body-secondary">agora</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    {{ $error }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <!-- Scripts do Bootstrap -->
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
                        <script>
                            let likes = 0;
                            let dislikes = 0;

                            function aumentarLikes() {
                                likes++;
                                document.getElementById('likes').innerText = likes;
                            }

                            function aumentarDislikes() {
                                dislikes++;
                                document.getElementById('dislikes').innerText = dislikes;
                            }

                            function toggleRespostas(button) {
                                var respostasContainer = button.nextElementSibling;
                                if (respostasContainer.style.display === "none") {
                                    respostasContainer.style.display = "block";
                                    button.textContent = "Ver Menos Comentários";
                                } else {
                                    respostasContainer.style.display = "none";
                                    button.textContent = "Ler Comentários";
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>