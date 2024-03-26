<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostReplyController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;

/*use App\Http\Controllers\PostReplyController;

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('telaInicio');
});

Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::resource('posts', PostController::class);
    Route::resource('posts.replies', PostReplyController::class)->shallow();
    Route::post('/posts/reply/{postId}', [PostReplyController::class, 'store'])->name('posts.reply.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/editImagemUser', [ProfileController::class, 'editImagemUser'])->name('profile.editImagemUser');
    Route::post('/profile/editImagemUser_banner', [ProfileController::class,'editImagemUser_banner'])->name('profile.editImagemUser_banner');
    Route::get('/profile.pesquisar', [ProfileController::class, 'showGerenciador'])->name('profile.pesquisar');
    Route::get('/profile/{id}', [ProfileController::class, 'showPerfil'])->name('profile.show');
    Route::get('/profile/{userId}', [ProfileController::class, 'showPerfil'])->name('profile.show');


    Route::post('/send-friend-request/{receiverId}', [FriendRequestController::class, 'sendFriendRequest'])->name('send-friend-request');
    Route::post('/accept-friend-request/{requestId}', [FriendRequestController::class, 'acceptFriendRequest'])->name('accept-friend-request');
    Route::delete('/decline-friend-request/{requestId}', [FriendRequestController::class, 'declineFriendRequest'])->name('decline-friend-request');
    Route::get('/view-amigos/{userId}', [FriendRequestController::class, 'viewAmigos'])->name('view-amigos');
    Route::get('/friends', [FriendController::class, 'listFriends'])->name('friends.list');



    Route::get('/conversa/{amigoId}', [MessageController::class, 'index'])->name('conversa.iniciar');
    Route::get('/batebapo', [MessageController::class, 'index'])->name('batebapo');
    Route::post('/send-message', [MessageController::class, 'sendMessage']);
    Route::get('/get-messages/{recipientId}', [MessageController::class, 'getMessages']);
});

require __DIR__ . '/auth.php';
