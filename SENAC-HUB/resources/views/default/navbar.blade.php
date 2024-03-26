<header class="cabecalho">
    <style>
        .lista-dropdown {
            position: absolute;
            top: 100%;
            /* Posiciona o dropdown abaixo do cabeçalho */
            right: 0;
            z-index: 1000;
            /* Garante que o dropdown fique sobreposto aos outros elementos */
        }

        .cor_digite_nome {
            color: #FFF;
        }
    </style>
    <a href="{{route('dashboard')}}">
        <img href="{{ route('dashboard') }}" class="tamanho_logo" src="https://senachub.webapptech.cloud/public/imagens/LogoSenac.png" alt="Logo SenacHub">
    </a>
    <form method="get" action="{{ route('profile.pesquisar') }}">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputcodigo" class="col-form-label cor_digite_nome">Digite o Nome</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputcodigo" name="name" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

    </nav>
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
                        <x-dropdown-link class="nav-link" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Sair') }}</x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>