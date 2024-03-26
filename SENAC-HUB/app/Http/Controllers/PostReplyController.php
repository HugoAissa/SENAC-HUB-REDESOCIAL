<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostReply;
use Illuminate\Support\Facades\Auth;
class PostReplyController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
 
        $post = Post::findOrFail($postId);
 
        $reply = new PostReply();
        $reply->content = $request->content;
        $reply->user_id = Auth::id();
        $reply->post_id = $post->id;
        $reply->save();
 
        return back()->with('success', 'Resposta adicionada com sucesso!')->with('postId', $post->id);
    }
 
    // Exibir o formulário de edição de uma resposta
    public function edit($postId, $replyId)
    {
        $post = Post::findOrFail($postId);
        $reply = PostReply::findOrFail($replyId);
 
        return view('posts.edit-reply', compact('post', 'reply'));
    }
 
    // Atualizar uma resposta
    public function update(Request $request, $postId, $replyId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
 
        $reply = PostReply::findOrFail($replyId);
        $reply->content = $request->content;
        $reply->save();
 
        return redirect()->route('posts.show', $postId)->with('success', 'Resposta atualizada com sucesso!');
    }
 
    // Excluir uma resposta
    public function destroy($postId, $replyId)
    {
        $reply = PostReply::findOrFail($replyId);
        $reply->delete();
 
        return redirect()->route('posts.show', $postId)->with('success', 'Resposta excluída com sucesso!');
    }
}