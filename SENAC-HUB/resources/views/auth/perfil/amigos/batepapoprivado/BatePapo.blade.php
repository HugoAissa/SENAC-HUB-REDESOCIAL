<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Vue.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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


            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(110deg, #000 0%, #2E2E2E 54.5%, #555 100%);
            flex-shrink: 0;

        }
        
        .tamanho_logo {
            width: 105px;
            height: 52px;
        }

        button {
            color: #E7E7E7;
            background-color: #284065;
            font-weight: 400;
            font-size: 16px;
            font-style: normal;
            font-family: 'Manrope', sans-serif;
            border-radius: 4px;
            border: 1px solid #FFF;
            background: #1D1D1D;


           
           
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .tamanho_perfil {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    background-color: #f0f0f0;
    margin-right: 10px; /* Adicionando espaçamento à direita da imagem de perfil */
}

.tamanho_perfil img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 50%;
}
.message-container {
    margin-bottom: 10px; /* Adicionando espaçamento entre as mensagens */
}

.tamanho_perfil img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 50%;
}
        </style>

</head>
<body>
@extends('default/navbar')
@section('navbar')
    <br>
    <br>
    <br>
<div class="container mt-5 center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if ($friend && auth()->user()->isFriend($friend))
                    <div id="app">
                        <div v-for="message in messages" :key="message.id" class="message-container">
                        <div v-if="message.sender_id === {{ $friend->id }}" class="d-flex justify-content-end">
                        <div class="text-end">
                        @if ($friend->image_link_user)
                        <img class="tamanho_perfil" src="{{ $friend->image_link_user }}" alt="Imagem de Perfil">
                    @else
                        <img class="tamanho_perfil" src="https://senachub.webapptech.cloud/public/imagens/avatar.svg" alt="Imagem avatar SVG">
                    @endif
                        <strong>{{ $friend->name }}:</strong> @{{ message.content }}
                        </div>
                    </div>
                    <div v-else class="d-flex justify-content-start">
                        <div class="text-start">
                        <img src="{{ auth()->user()->image_link_user }}" class="tamanho_perfil" alt=""></img><strong>{{ auth()->user()->name }}:</strong> @{{ message.content }}
                        </div>
                    </div>

                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <input type="text" v-model="newMessage" class="form-control" placeholder="Digite sua mensagem">
                            <button @click="sendMessage" :disabled="!newMessage.trim()" class="button">Enviar</button>
                        </div>
                    </div>
                    @else
                        <p>Você não tem permissão para acessar este chat.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    </body>

    <script>
    new Vue({
        el: '#app',
        data() {
            return {
                friend: null,
                messages: [],
                newMessage: '',
                recipientId: {{ $friend->id }}, // Defina o ID do destinatário aqui
            };
        },
        mounted() {
            this.fetchFriend();
            this.fetchMessages();
            // Atualiza as mensagens a cada 5 segundos
            setInterval(this.fetchMessages, 1000);
        },
        methods: {
            fetchFriend() {
                // Lógica para buscar o amigo do backend
                // Substitua este exemplo com sua própria lógica de busca
                this.friend = { id: 1, name: 'Amigo' }; // Exemplo de amigo
            },
            fetchMessages() {
                axios.get(`/get-messages/${this.recipientId}`)
                    .then(response => {
                        this.messages = response.data.messages;
                    })
                    .catch(error => {
                        console.error('Erro ao buscar mensagens:', error);
                    });
            },
            sendMessage() {
                if (this.newMessage.trim() === '') {
                    console.error('A mensagem está vazia.');
                    return;
                }

                axios.post('/send-message', {
                        recipient_id: this.recipientId,
                        content: this.newMessage
                    })
                    .then(response => {
                        console.log('Mensagem enviada:', response.data.message);
                        this.newMessage = ''; // Limpa o campo de entrada após o envio da mensagem
                        this.fetchMessages(); // Atualiza as mensagens após o envio da mensagem
                    })
                    .catch(error => {
                        console.error('Erro ao enviar mensagem:', error);
                    });
            }
        },
        computed: {
            isFriend() {
                return this.friend && auth().user().isFriend(this.friend);
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</html>