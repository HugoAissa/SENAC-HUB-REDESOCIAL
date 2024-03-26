@extends('default/default2')
@section('content2')
    <!-- CABEÇALHO -->

    <!-- Fim do conteúdo do menu dropdown -->

    <!-- MEU PERFIL -->
    <div class="body_padrao_tela_publi">
        <div
            class="px-1 py-1 bg-black bg-opacity-10 border border--bottom1 border-black border-opacity-10 justify-content-end">
            <div class="bg-white bg-opacity-10 col-11 justify-content-center d-flex">
                <a class="removerlinha" href="{{ route('profile.show', Auth::user()->id) }}">

                <p class="m-0 px-3 py-7 font-custom" name="btn_meuperfil">Meu Perfil</p>

                </a>
            </div>
        </div>

        <!-- FOTO DE PERFIL -->
        <div class="foto_perfil">
            <div class="row justify-content-center align-items-center">
                <div class="col-9">
                    <div class="rounded-1 d-flex justify-content-center">
                        @if (Auth::user()->image_link_user)
                            <img class="perfil_img" src="{{ Auth::user()->image_link_user }}" alt="Imagem de Perfil">
                        @else
                            <img class="perfil_img" src="https://senachub.webapptech.cloud/public/imagens/avatar.svg" alt="Imagem avatar SVG">
                        @endif

                        <div class="square"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFORMAÇÕES PERFIL-->
        <div class="info_perfil">
            <h2 class="h2">
                <div>{{ Auth::user()->name }}</div>
            </h2>
            <p class="p">Curso</p>
            <div class="unidade_color">Técnico em informática
            </div>

            <p class="p2"> Unidade </p>

            <div class="unidade_color">{{ Auth::user()->unidade }}
            </div>

            <p class="p"> BIO </p>
            <div class="unidade_color">{{ Auth::user()->bio }}
            </div>
            <br>
            <button type="button" onclick="window.location='{{ route('profile.edit') }}'"
                class="btn btn-primary editar-perfil">Editar Perfil</button>

            <!-- NÃO SEI OQ É ISSO AINDA -->
            <div class="opcoes">
                <ul>
                    <li>Senac EAD</li>
                    <li>Grupos</li>
                    <li>Eventos</li>
                    <li>Cursos</li>
                    <li>Bolsa de Estudo</li>
                    <li>Vagas</li>
                    <li>Atividades</li>
                    <li>Aulas</li>
                </ul>
            </div>
        </div>

        <!-- Conteúdo do main -->
        <main class="telaPubli_main">
            <h5 class="h5">Criar Publicação</h5>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="message" class="form-label msg_publi">Mensagem:</label>
                    <textarea class="form-control" id="message" rows="7" name="content" required></textarea>
                </div>
                <div class="upload-container mb-3">
                    <input class="form-control" type="file" id="photo" name="image" accept="image/*">
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary editar-perfil">Publicar</button>
                </div>
            </form>
        </main>
        <!--AAA-->

        <div class="padrao">
            @foreach ($posts->reverse() as $post)
                <!-- Conteúdo da publicação -->
                <div class="publicacao">

                    <!-- Nome do usuário que fez a publicação -->
                    @if ($post->user->image_link_user)
                        <img class="tamanho_perfil" src="{{ $post->user->image_link_user }}" alt="Imagem de Perfil">
                    @else
                        <img class="tamanho_perfil" src="https://senachub.webapptech.cloud/public/imagens/avatar.svg" alt="Imagem avatar SVG">
                    @endif
                    <div class="nome-usuario">
                        <a class="removerlinha" href="{{ route('profile.show',  $post->user->id) }}" class="link-usuario">{{ $post->user->usuario }}</a>
                    </div>
                    <!-- Mensagem da publicação -->
                    <div class="mensagem">{{ $post->content }}</div>
                    @if ($post->image_link)
                        <img class="image_center" src="{{ $post->image_link }}" alt="Imagem do post">
                    @endif
                    <div class="card-footer">
                        Postado em: {{ $post->created_at->format('H:i:s') }}
                    </div>

                    <!-- Botões de like e dislike -->
                    <div class="botoes-like-dislike">
                        <button type="button" class="btn-like" onclick="aumentarLikes()"><i class="bi bi-hand-thumbs-up"
                                style="font-size: 15px;"></i> <span class="contador-likes" id="likes">0</span></button>
                        <button type="button" class="btn-dislike" onclick="aumentarDislikes()"><i
                                class="bi bi-hand-thumbs-down" style="font-size: 15px;"></i> <span class="contador-likes"
                                id="dislikes">0</span></button>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary btn_responder" data-bs-toggle="modal"

                            data-bs-target="#replyModal2{{ $post->id }}">
                            Comentar
                        </button>
                    </div>



                    <div class="ver-mais-container">
                        <button type="text" onclick="toggleRespostas(this)">
                            Ler Comentários
                        </button>
                        <div class="respostas" style="display: none;">
                            <!-- Aqui serão exibidas as respostas -->
                            @if ($post->replies()->exists())
                                @foreach ($post->replies as $reply)
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            @if ($reply->user->image_link_user)
                                                <img class="tamanho_perfil" src="{{ $reply->user->image_link_user }}"
                                                    alt="Imagem de Perfil">
                                            @else
                                                <img class="tamanho_perfil" src="https://senachub.webapptech.cloud/public/imagens/avatar.svg"
                                                    alt="Imagem avatar SVG">
                                            @endif
                                            <div class="card-body">
                                                <a href="{{ route('profile.show', $reply->user->id) }}">
                                                    <strong>Respondido por:</strong> {{ $reply->user->usuario }}
                                                </a>
                                                <br>
                                                <strong>Resposta:</strong> {{ $reply->content }}
                                                <br>
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
            @endforeach
        </div>


        <!-- Botão de resposta -->

    </div>

    <!--AAA-->



    <!-- Modal de Resposta -->
    @foreach ($posts as $post)
        <div class="modal fade" id="replyModal2{{ $post->id }}" tabindex="-1"
            aria-labelledby="replyModalLabel{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replyModalLabel{{ $post->id }}">Responder Postagem
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('posts.reply.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="replyContent{{ $post->id }}" class="form-label">Sua
                                    Resposta</label>
                                <textarea class="form-control" id="replyContent{{ $post->id }}" name="content" rows="3"></textarea>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Comentar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
@endsection
