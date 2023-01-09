<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Follow;
use App\Models\post_like;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPostLike(Request $r){
        $post_like = new post_like();
        $post_like->user_id = $r->user_id;
        $post_like->post_id = $r->post_id;
        $post_like->save();
        return $post_like;
    }

    // public function getPostLikes(Request $r){
    //     $post_id = $r->post_id;
    //     $user_id = $r->user_id;
    //     $post_like = post_like::all();
        
    //     if($post_id != null){
    //         $post_like = $post_like->where("post_id",$post_id);
    //     }
    //     if($user_id != null){
    //         $post_like = $post_like->where("user_id",$user_id);
    //     }
    //     $post_like = $post_like->values();
    //     return $post_like;
    // }

    public function getPostLikes(Request $r){
        $user_id = $r->user_id;
        $post_like = post_like::where("user_id", $user_id)->get();
        return makeJson(200, "Sukses get like", $post_like);
    }

    public function getPosts(Request $r){
        $id = $r->id;
        $title = $r->title;
        $post = Post::all();
        if($id != null){
            $post = $post->where("id",$id);
        }
        if($title != null){
            $post = $post->where("title",$title);
        }
        $post = $post->values();
        return makeJson(200, "Sukses get posts",$post);
    }

    public function addPost(Request $r){
        $post = new Post();
        $post->user_id = $r->user_id;
        $post->title = $r->title;
        $post->body = $r->body;
        $post->like_count = 0;
        $post->save();
        return makeJson(200,"Sukses add post",[$post]);
    }

    public function getAllPostRelated(Request $r){
        try{
            $user_id = $r->user_id;
            $follow = Follow::where('user_id', $user_id)->orWhere("follow_id", $user_id)->get(); 
            
            $post = Post::all();

            $userFriendsId = [$user_id];

            foreach ($follow as $key => $value) {
                if($value->user_id == $user_id){
                    array_push($userFriendsId, $value->follow_id);
                }else{
                    array_push($userFriendsId, $value->user_id);
                }
            }

            $post = Post::whereIn("user_id",$userFriendsId)->get();
           
            return makeJson(200, "Sukses get post",$post);
        }catch(\Throwable $th){
            return makeJson(400, $th->getMessage(), null);
        }
    }

    public function removeLike(Request $r){
        $user_id = $r->user_id;
        $post_id = $r->post_id;

        $post_like = post_like::where("post_id", $post_id)->where('user_id',$user_id)->delete();
        return makeJson(200, "Berhasil unlike post", [$post_like]);
    }
}
