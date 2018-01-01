<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use DB;

class CommentController extends Controller
{
    public function showApproved()
    {
    	$data['comments'] = Comment::where('is_show', TRUE)
    						->orderBy('created_at', 'DESC')
    						->paginate(10);

    	return view('admin.comments.approved', $data);
    }

    public function showNonApproved()
    {
    	$data['comments'] = Comment::where('is_show', FALSE)
    						->orderBy('created_at', 'DESC')
    						->paginate(10);

    	return view('admin.comments.nonapproved', $data);
    }

    public function activated(Request $request,$id)
    {
    	try {
            DB::beginTransaction();

            $article = Comment::find($id);
            $article->is_show = TRUE;
            $article->save();

            $request->session()->flash('alert-success','Comment successfully showed');

            DB::commit(); 

            return redirect(route('comments.nonapproved'));
        }
        catch (Exception $e) {
            return Redirect::back()->with('error_message', $e->getMessage())->withInput();
        }
    }

    public function deactivated(Request $request,$id)
    {
    	try {
            DB::beginTransaction();

            $article = Comment::find($id);
            $article->is_show = FALSE;
            $article->save();

            $request->session()->flash('alert-success','Comment successfully not showing');

            DB::commit(); 

            return redirect(route('comments.approved'));
        }
        catch (Exception $e) {
            return Redirect::back()->with('error_message', $e->getMessage())->withInput();
        }
    }

    public function hapusComment(Request $request,$id)
    {
    	echo "string";
    }

    public function reply($id)
    {
    	$data['comment'] = Comment::find($id);

    	return view('admin.comments.reply', $data);
    }
}
