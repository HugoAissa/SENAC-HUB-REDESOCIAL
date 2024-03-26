<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
 
use Illuminate\Http\Request;
use App\Models\Post;
 
class PostController extends Controller
{
    public function index()
    {   
        $posts = Post::with('user')->get();
        return view('auth.telaPublicacao', compact('posts'));
    }
 
    // Exibir o formulário de criação de postagem
    public function create()
    {
        return view('posts.create');
    }
 
 
    // Salvar uma nova postagem
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação para imagem
        ]);
    
        $post = new Post();
        $post->content = $request->content;
        $post->user_id = Auth::id();
    
        // Salvar a imagem na pasta pública, se existir
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); // Salva na pasta 'public/images'

            // Obtendo o link completo da imagem
            $imageLink = '/public/storage/' . $imagePath;

            // Salvando o link da imagem no banco de dados
            $post->image_link = $imageLink;
        }
    
        $post->save();
    
        return back()->with('success', 'Postagem adicionada com sucesso!')->with('postId', $post->id);
    }
 
 
 
    // Exibir uma postagem específica
    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
 
    // Exibir o formulário de edição de postagem
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
 
    // Atualizar uma postagem existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
 
        $post = Post::findOrFail($id);
        $post->content = $request->content;
        $post->save();
 
        return redirect()->route('posts.index')->with('success', 'Postagem atualizada com sucesso!');
    }
 
    // Excluir uma postagem
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
 
        return redirect()->route('posts.index')->with('success', 'Postagem excluída com sucesso!');
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
}