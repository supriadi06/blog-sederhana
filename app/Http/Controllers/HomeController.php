<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Article;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Comment;
use App\Visitor;

class HomeController extends Controller
{
    public function index($id)
    {
    	$data['articles'] = Article::whereRaw('category_id='.$id.' AND is_show = TRUE')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(5);

    	return view('index', $data);
    }

    public function showArticle($id)
    {
    	$data['article'] = Article::find($id);
        $data['count'] = Comment::whereRaw('article_id='.$id.' AND is_show = TRUE')->get();
        $data['comments'] = Comment::whereRaw('article_id='.$id.' AND is_show = TRUE AND parent_id is NULL')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(5);
    	return view('show_article', $data);
    }

    public function storeComment(Request $request, $id)
    {

        try {
            DB::beginTransaction();
            $visited = Visitor::where('email', $request->email)->first();
            if($visited === null)
            {
                $visitor = new Visitor;
                $visitor->email = $request->email;
                $visitor->name = $request->name;
                $visitor->save();
                $visitor = $visitor->id;
            }else{
                $visitor =  $visited->id;
            }

            if($request->commentType != 0)
            {
                $Comment = Comment::find($request->replyCommentId);
                $Comment->is_parent = TRUE;
                $Comment->save();
            }

            $comment = new Comment;
            $comment->article_id = $id;
            $comment->visitor_id = $visitor;
            $comment->comments = $request->comment;
            
            if($request->commentType != 0)
            {
                $comment->parent_id = $request->replyCommentId;
            }

            $comment->save();

            $request->session()->flash('alert-success','Komentar berhasil disimpan dan menunggu persetujuan moderator.');

            DB::commit();    

            return Redirect('/article/'.$id.'/show#body-comment');

        } catch (Exception $e) {
            return Redirect::back()->with('error-message', $e->getMessage())->withInput();
        }
    }
}
