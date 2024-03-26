@extends('default/default2')
@section('content2')
<br>


@foreach ($users as $pesquisarArray)
@if($pesquisarArray->id !== auth()->id())

<a href="{{ route('profile.show', $pesquisarArray->id) }}" class="card mb-3 removerlinha" style="max-width: 540px;">

    <div class="row g-0">
        <div class="col-md-4">
            @if ($pesquisarArray->image_link_user)
            <img class="img-fluid rounded-start custom-image-size" src="{{ $pesquisarArray->image_link_user }}" alt="Imagem de Perfil">
            @else
            <img class="img-fluid rounded-start custom-image-size" src="https://senachub.webapptech.cloud/public/imagens/avatar.svg" alt="Imagem avatar SVG">
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $pesquisarArray->name }}</h5>
                <p class="card-text">{{ $pesquisarArray->bio }}.</p>
                <br>
                <p class="card-text"><small class="text-body-secondary">{{ $pesquisarArray->unidade }}</small></p>

            </div>
        </div>
    </div>
    @if(!$pesquisarArray->isFriendOf(auth()->user()) && $pesquisarArray->id !== auth()->id())
    <h2 style="color: white;">Enviar Solicitação de amizade</h2>
    <ul>
        <li>
            <form id="sendFriendRequestForm{{ $pesquisarArray->id }}" action="{{ route('send-friend-request', $pesquisarArray->id) }}" method="POST">
                @csrf
                <button type="submit" onclick="sendFriendRequest(event, {{ $pesquisarArray->id }})">Enviar Solicitação</button>
            </form>
        </li>
    </ul>
    @else
    <h2 style="color: black;">Ja é seu amigo</h2>

    @endif
    

</a>
<li>



</li>
</div>
@endif
@endforeach
    <!-- Scripts -->
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
@endsection