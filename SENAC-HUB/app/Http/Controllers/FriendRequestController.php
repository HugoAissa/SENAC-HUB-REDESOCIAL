<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use App\Models\User;
use App\Models\Friend;
use Illuminate\Validation\ValidationException; // Importe a classe aqui

class FriendRequestController extends Controller
{
    public function sendFriendRequest(Request $request, $receiverId)
    {
        $senderId = auth()->id();

        // Verificar se já existe uma solicitação entre os usuários
        $existingRequest = FriendRequest::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })
            ->orWhere(function ($query) use ($senderId, $receiverId) {
                $query->where('sender_id', $receiverId)
                    ->where('receiver_id', $senderId);
            })
            ->exists();

        // Verificar se já são amigos
        $areFriends = Friend::where(function ($query) use ($senderId, $receiverId) {
            $query->where('user_id', $senderId)
                ->where('friend_id', $receiverId);
        })->orWhere(function ($query) use ($senderId, $receiverId) {
            $query->where('user_id', $receiverId)
                ->where('friend_id', $senderId);
        })->exists();

        // Verificar se a condição é false e adicionar a lógica correspondente
        if (!$existingRequest && !$areFriends) {
            FriendRequest::create([
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
                'accepted' => false,
            ]);

            return redirect()->back()->with('success', 'Solicitação de amizade enviada com sucesso.');
        } else {
            // Retorne os erros diretamente para a view
            throw ValidationException::withMessages(['error' => 'Já existe uma solicitação de amizade entre vocês ou vocês já são amigos.']);
        }
    }

    public function acceptFriendRequest($requestId) {
        $request = FriendRequest::findOrFail($requestId);

        // Verifica se a solicitação já foi aceita anteriormente
        if ($request->accepted) {
            throw ValidationException::withMessages(['error' => 'Esta solicitação de amizade já foi aceita.']);
        }

        // Verifica se o usuário autenticado é o destinatário da solicitação
        if ($request->receiver_id === auth()->id()) {
            // Atualiza o campo accepted apenas se houver alterações
            $request->accepted = true;
            $request->save();

            // Cria as entradas na tabela Friend para representar a amizade
            Friend::create([
                'user_id' => $request->sender_id,
                'friend_id' => $request->receiver_id,
            ]);

            Friend::create([
                'user_id' => $request->receiver_id,
                'friend_id' => $request->sender_id,
            ]);

            return redirect()->back()->with('success', 'Solicitação de amizade aceita com sucesso!');
        } else {
            throw ValidationException::withMessages(['error' => 'Você não tem permissão para aceitar esta solicitação.']);
        }
    }

    public function declineFriendRequest($requestId)
    {
        $friendRequest = FriendRequest::findOrFail($requestId);

        // Verificar se o usuário autenticado é o destinatário da solicitação
        if ($friendRequest->receiver_id === auth()->id()) {
            $friendRequest->delete(); // Excluir a solicitação de amizade
            return redirect()->back()->with('success', 'Solicitação de amizade recusada com sucesso.');
        } else {
            throw ValidationException::withMessages(['error' => 'Não autorizado.']);
        }
    }
    // Outros métodos do controller
    public function viewAmigos($userId)
    {
        // Encontre o usuário com o ID fornecido

        $user = User::findOrFail($userId);

        // Busque as solicitações de amizade pendentes recebidas pelo usuário
        $solicitacoes = FriendRequest::where('receiver_id', $user->id)
            ->whereNull('accepted')
            ->get();

        // Busque os amigos do usuário
        $amigos = $user->friends;

        // Retorne a view com os dados necessários
        return view('auth.perfil.amigos.viewamigos', compact('user', 'amigos', 'solicitacoes'));
    }
}
