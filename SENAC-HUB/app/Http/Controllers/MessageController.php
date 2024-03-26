<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Adiciona o middleware de autenticação a todos os métodos do controlador
    }

    public function index($amigoId)
    {
        // Verifica se o amigo existe
        $friend = User::find($amigoId);
        if (!$friend) {
            abort(404, 'Amigo não encontrado.');
        }

        // Verifica se o usuário logado é amigo desse amigo
        $user = auth()->user();
        if (!$user->isFriend($friend)) {
            abort(403, 'Você não tem permissão para acessar este chat.');
        }

        // Lógica para recuperar as mensagens do banco de dados entre o usuário e o amigo
        $messages = Message::where(function($query) use ($user, $amigoId) {
                                $query->where('sender_id', $user->id)
                                      ->where('recipient_id', $amigoId);
                            })
                           ->orWhere(function($query) use ($user, $amigoId) {
                                $query->where('sender_id', $amigoId)
                                      ->where('recipient_id', $user->id);
                            })
                           ->orderBy('created_at', 'asc')
                           ->get();

        return view('auth.perfil.amigos.batepapoprivado.BatePapo', [
            'messages' => $messages,
            'friend' => $friend, // Passe o amigo para a visão
            'user' => $user // Passe o usuário autenticado para a visão
        ]);
    }


    // Outros métodos do controlador aqui...


    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'content' => $request->content
        ]);

        broadcast(new MessageSent($message));

        return response()->json(['message' => 'Message sent.']);
    }

    public function getMessages($recipientId)
    {
        $user = auth()->user();

        // Lógica para recuperar todas as mensagens trocadas entre o usuário autenticado e o destinatário
        $messages = Message::where(function($query) use ($user, $recipientId) {
                                $query->where('sender_id', $user->id)
                                      ->where('recipient_id', $recipientId);
                            })
                           ->orWhere(function($query) use ($user, $recipientId) {
                                $query->where('sender_id', $recipientId)
                                      ->where('recipient_id', $user->id);
                            })
                           ->orderBy('created_at', 'asc')
                           ->get();

        return response()->json(['messages' => $messages]);
    }
}
