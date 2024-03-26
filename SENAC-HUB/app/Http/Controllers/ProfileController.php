<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{

    public function editImagemUser(Request $request)
{
    $request->validate([
        'image_link_user' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para imagem
    ]);

    // Verificar se o usuário está autenticado
    if (Auth::check()) {
        // Obtenha o usuário autenticado atualmente
        $user = Auth::user();

        // Salvar a imagem na pasta pública, se existir
        if ($request->hasFile('image_link_user')) {
            $image = $request->file('image_link_user');
            $imagePath = $image->store('images', 'public'); // Salva na pasta 'public/images'

            // Obtendo o link completo da imagem
            $imageLink = '/public/storage/' . $imagePath;

            // Salvando o link da imagem no banco de dados
            $user->image_link_user = $imageLink;
        }
        $user->save(); // Salva as alterações do usuário apenas se houver uma nova imagem

        return view('profile.edit', [
            'user' => $user,
        ])->with('success', 'Imagem de perfil adicionada com sucesso!');
    } else {
        // O usuário não está autenticado, redirecione para a página de login ou faça qualquer outra ação necessária
        return redirect()->route('login');
    }
}

public function editImagemUser_banner(Request $request)
{
    $request->validate([
        'image_link_user_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para imagem
    ]);

    // Verificar se o usuário está autenticado
    if (Auth::check()) {
        // Obtenha o usuário autenticado atualmente
        $user = Auth::user();

        // Salvar a imagem na pasta pública, se existir
        if ($request->hasFile('image_link_user_banner')) {
            $image = $request->file('image_link_user_banner');
            $imagePath = $image->store('images', 'public'); // Salva na pasta 'public/images'

            // Obtendo o link completo da imagem
            $imageLink = '/public/storage/' . $imagePath;

            // Salvando o link da imagem no banco de dados
            $user->image_link_user_banner = $imageLink;
        }
        $user->save(); /// Salva as alterações do usuário apenas se houver uma nova imagem

        return view('profile.edit', [
            'user' => $user,
        ])->with('success', 'Imagem do banner do perfil adicionada com sucesso!');
    } else {
        // O usuário não está autenticado, redirecione para a página de login ou faça qualquer outra ação necessária
        return redirect()->route('login');
    }
}
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateProfileInformation(Request $request)
{

}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function showGerenciador(Request $request){
        $dados = User::query();
        $dados->when($request->name,function($query,$users){
            $query->where('name','like','%'.$users.'%');

        });
        $dados =$dados ->get();
        return view('auth.perfil.pesquisar',['users' => $dados]);


    }
    public function showPerfil($id)
    {
        $user = User::findOrFail($id);

        return view('auth.perfil.perfil', compact('user'));
    }
    public function showPerfilA($id)
    {
        // Assuming you fetch the user from the database
        $user = User::findOrFail($id);

        // Assuming $receiverId should be the user's ID
        $receiverId = $user->id;

        return view('auth.perfil.perfil', compact('user', 'receiverId'));
    }

}
