<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\FriendRequest;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usuario',
        'unidade',
        'bio',
        'image_link_user',
        'image_link_user_banner',



    ];

    protected $guarded = [];

    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'receiver_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function isFriendOf(User $user)
    {
        return $this->friends()->where('users.id', $user->id)->exists();
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');

    }
    public function acceptedFriendRequests()
    {
        return $this->hasMany(FriendRequest::class, 'receiver_id')->where('accepted', true);
    }
    public function hasSentFriendRequest($receiverId)
    {
        return $this->sentFriendRequests()->where('receiver_id', $receiverId)->exists();
    }
    public function hasReceivedFriendRequestFrom($senderId)
    {
        // Verifica se existe uma solicitação de amizade pendente do usuário com o ID $senderId
        return $this->receivedFriendRequests()->where('sender_id', $senderId)->exists();
    }
    public function isFriend(User $user)
    {
        return $this->friends->contains($user);
    }

    /**
     * Define o relacionamento com os amigos do usuário.
     */
    // Método para verificar se um usuário é amigo de outro
    public function isFriendWith($user)
    {
        return $this->friends()->where('friend_id', $user->id)->exists();
    }
}
