<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use App\Models\Friend;

use App\Models\User;

class FriendController extends Controller
{
    public function acceptFriendRequest($requestId)
    {
        $friendRequest = FriendRequest::findOrFail($requestId);

        // Verificar se o usuário autenticado é o destinatário da solicitação
        if ($friendRequest->receiver_id === auth()->id()) {
            // Depurar para garantir que a solicitação de amizade foi encontrada
            dd($friendRequest);

            $friendRequest->delete();

            // Criar a entrada na tabela de amigos
            Friend::create([
                'user_id' => auth()->id(), // O ID do usuário autenticado
                'friend_id' => $friendRequest->sender_id, // O remetente da solicitação é o amigo
            ]);
            // Crie também a relação inversa se desejar

            // Redirecionar de volta com uma mensagem de sucesso
            return redirect()->back()->with('success', 'Solicitação de amizade aceita com sucesso.');
        } else {
            // Retornar uma resposta de erro se o usuário não estiver autorizado
            return response()->json(['error' => 'Não autorizado.'], 401);
        }
    }
    public function removeFriend($friendId)
    {
        $friend = Friend::findOrFail($friendId);
        if ($friend->user1_id === auth()->id() || $friend->user2_id === auth()->id()) {
            $friend->delete();
            // Remova também a relação inversa se desejar
            return response()->json(['message' => 'Friend removed.']);
        } else {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }
    }


}
