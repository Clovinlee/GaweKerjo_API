<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComments(Request $r)
    {
        $c=Comment::all();
        if ($r->id!=null) {
            $c=$c->where("id",$r->id);
        }
        if ($r->user_id!=null) {
            $c=$c->where("user_id",$r->user_id);
        }
        return $c->values();
    }
    public function addComment(Request $r)
    {
        $c=new Comment();
        $c->user_id=$r->user_id;
        $c->body=$r->body;
        $c->save();
    }
}
