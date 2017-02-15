<?php

namespace App\Console\Commands;

use App\Post;
use Illuminate\Console\Command;

class RenderPostsToMarkdown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ibd:render_posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Turns your posts into Markdown for Hugo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::all()->load('tags');
        foreach($posts as $post) {
            $data = view('posts.markdown')->with('post', $post);
            $path = base_path('posts/') . "{$post->id}-{$post->slug}.md";
            \File::put($path, $data);
        }
    }
}
