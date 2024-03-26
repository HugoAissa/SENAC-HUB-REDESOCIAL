@foreach ($posts as $post)
    <div class="card">
        <div class="card-header">
            Postado por: {{ $post->user->usuario }}
        </div>
        <div class="card-body">
            {{ $post->content }}
        </div>
        <div class="card-footer">
            Postado em: {{ $post->created_at->format('d/m/Y H:i:s') }}
        </div>

        <!-- Verifica se há respostas -->
        @if ($post->replies->isNotEmpty())
            <div class="card-footer">
                <h5>Respostas:</h5>
                @foreach ($post->replies as $reply)
                    <div class="card mt-2">
                        <div class="card-header">
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
    </div>
@endforeach
