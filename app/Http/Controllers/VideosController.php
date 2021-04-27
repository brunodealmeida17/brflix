<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideosController extends Controller
{
    public function store(Request $request){
        $video = new Video();
        $video->title = $request->title;
        $video->description=$request->description;
        $video->slug= strtolower(str_replace('',"-", $request->title));
        $video->urls = $request -> url;
        $video->image= $request -> image;
        !empty($request->featured) ? $video->featured= 1 : $video->featured = 0;
        $video->activated="1";
        $video->created_at=now();
        $video->categories_id= $request-> category;

        $saved = $video->save();

        if($saved){
         //
        }
       return redirect() ->route('home');

    }
    /*public function returnIdYoutube($link){
        $video_id = explode('?v=', $link); //para vídeos como https://www.youtube.com/watch...
        if (empty($video_id[1]));
        $video_id = explode('/v/', $link); //para vídeos como https://www.youtube.com/watch...
        $video_id = explode('&', $video_id[1]); //deletando qualquer outro parâmetro
        $video_id = $video_id[0];

        return $video_id;
    } */
}
