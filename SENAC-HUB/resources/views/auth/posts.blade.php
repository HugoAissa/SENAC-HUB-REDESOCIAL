@extends('default/default')
@section('content')
    @foreach ($posts as $post)
        <div class="card">

            <div class="card-header">
                <h5>Postagem:</h5>
                <div class="card mt-2">

                    Postado por: {{ $post->user->usuario }}
                </div>
                <div class="card-body">
                    {{ $post->content }}
                </div>
                <div class="card-footer">
                    Postado em: {{ $post->created_at->format('d/m/Y H:i:s') }}
                </div>

            </div>

            <!-- Verificar se há respostas associadas -->
            @if ($post->replies()->exists())
                @foreach ($post->replies as $reply)
                    <div class="card">
                        <div class="card-header">
                            <h5>Respostas:</h5>

                            <div class="card mt-2">

                                Respondido por: {{ $reply->user->usuario }}
                            </div>
                            <div class="card-body">
                                {{ $reply->content }}
                            </div>
                            <div class="card-footer">
                                Respondido em: {{ $reply->created_at->format('d/m/Y H:i:s') }}

                            </div>

                        </div>
                @endforeach
        </div>
    @endif

    <!-- Botão de resposta -->
    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#replyModal{{ $post->id }}">
            Responder
        </button>
    </div>

    <!-- Modal de Resposta -->
    <div class="modal fade" id="replyModal{{ $post->id }}" tabindex="-1"
        aria-labelledby="replyModalLabel{{ $post->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel{{ $post->id }}">Responder Postagem</h5>
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
                        <button type="submit" class="btn btn-primary">Responder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
