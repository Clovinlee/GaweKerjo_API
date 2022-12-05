<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            "user_id" => 1,
            "title" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            'body'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat justo ex, at consequat odio dapibus quis. Aliquam ut dolor ante. Sed ultrices augue non felis tristique pellentesque. Sed sit amet feugiat sem. Nunc tortor nibh, laoreet laoreet risus eget, ultrices rhoncus nulla. Etiam quis sem ligula. Ut sed urna eget magna feugiat malesuada. Maecenas eget lorem tempor, maximus libero vitae, ornare quam. Aenean ac quam neque. Nunc pulvinar libero eget lobortis laoreet. Donec tincidunt facilisis mi, in porta est mollis ut.

            Ut tristique lorem sed leo fringilla convallis. Suspendisse porttitor sollicitudin nisi, eget accumsan felis porta in. Vivamus porta maximus facilisis. Morbi varius semper urna nec pharetra. Nam ac efficitur risus. Sed fringilla turpis nec orci suscipit viverra. Nulla facilisi. Sed nec pharetra quam. Vestibulum a blandit nunc. Cras vitae auctor turpis, non aliquet elit. Nam eget enim turpis. Aliquam cursus sagittis tincidunt. Morbi a urna vel tellus bibendum imperdiet a et tellus.
            
            Nam aliquam hendrerit enim sit amet laoreet. Nulla dignissim hendrerit justo, ut vestibulum dolor molestie quis. Vivamus non condimentum leo. Curabitur iaculis accumsan dui. Nunc sit amet eros urna. Cras faucibus eget dui vel lacinia. Sed nisl magna, efficitur vitae magna sit amet, auctor porttitor nibh.
            
            Curabitur nec neque non lectus tincidunt consectetur. Sed at orci sagittis, dictum diam at, viverra nunc. Integer ornare ex at consequat malesuada. In turpis leo, congue in gravida porta, vulputate eu mauris. Donec luctus purus eros, nec efficitur nisi mattis a. Pellentesque aliquam metus eu metus commodo, sed efficitur leo aliquet. Praesent ultricies nunc quis consequat sodales. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam lorem ligula, tincidunt sit amet sem ac, dignissim vestibulum lectus. Aliquam non risus viverra, semper mi sed, congue urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed a neque non dui venenatis rhoncus. Aliquam sed facilisis ex. Ut imperdiet nisl lorem, quis suscipit nunc aliquet vitae. Etiam mi diam, blandit vitae aliquam vitae, faucibus at turpis.
            
            Etiam arcu justo, luctus eget facilisis et, interdum non metus. Aenean scelerisque libero nec hendrerit elementum. Etiam maximus, urna vitae eleifend sodales, ipsum diam semper felis, vel convallis nibh elit vitae ex. Proin eu diam neque. Maecenas eu sollicitudin neque, id placerat felis. Ut lacinia turpis lorem, sit amet convallis turpis semper sit amet. Nam maximus nunc id ultricies congue. Duis eget ex consequat, fringilla ex eu, scelerisque purus. Duis tristique posuere sem et lobortis. Nulla vulputate arcu ut blandit aliquet. Praesent eu quam et urna convallis blandit. Sed in finibus urna. Nunc sed orci dapibus, tincidunt magna vitae, vestibulum ligula. Vivamus scelerisque faucibus metus, eget bibendum orci sagittis et.",
            'like_count' => 0,
            'created_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            "user_id" => 2,
            "title" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            'body'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat justo ex, at consequat odio dapibus quis. Aliquam ut dolor ante. Sed ultrices augue non felis tristique pellentesque. Sed sit amet feugiat sem. Nunc tortor nibh, laoreet laoreet risus eget, ultrices rhoncus nulla. Etiam quis sem ligula. Ut sed urna eget magna feugiat malesuada. Maecenas eget lorem tempor, maximus libero vitae, ornare quam. Aenean ac quam neque. Nunc pulvinar libero eget lobortis laoreet. Donec tincidunt facilisis mi, in porta est mollis ut.",
            'like_count' => 0,
            'created_at' => Carbon::now(),
        ]);
    }
}
