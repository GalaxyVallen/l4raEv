<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    // use HasFactory;
    Post::create([
        'title' => 'Fourth Impact',
        'slug' => 'fourth-impact',
        'excrpt' => 'Lorem ipsum dolor sit amet perspiciatis unde amet excepturi placeat totam. Fugiat?',
        'content' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id nam necessitatibus error a reprehenderit ratione quo iste perspiciatis illo vitae, dolore omnis vero eum ullam, harum quibusdam</p> <p>consequatur molestiae corrupti sequi sapiente? Nisi nemo recusandae culpa? Expedita aspernatur praesentium consectetur accusamus animi dicta aliquam non, minus, sunt laboriosam, totam amet commodi dolore libero obcaecati cupiditate illo saepe neque? Necessitatibus vitae harum iure dolorum id mollitia maxime quidem eveniet! Dolores, nostrum.</p> <p>Quam sit qui dicta eligendi iure totam dolorum provident, mollitia pariatur quidem soluta distinctio! Quas, error, expedita nemo itaque maiores possimus qui facere laudantium esse a ullam perspiciatis modi quia.</p>',
        'category_id' => 1,
        'user_id' => 1
    ]);
    Post::create([
        'title' => 'Third Impact',
        'slug' => 'third-impact',
        'excrpt' => 'Lorem ipsum dolor sit amet perspiciatis unde amet excepturi placeat totam. Fugiat?',
        'content' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id nam necessitatibus error a reprehenderit ratione quo iste perspiciatis illo vitae, dolore omnis vero eum ullam, harum quibusdam</p> <p>consequatur molestiae corrupti sequi sapiente? Nisi nemo recusandae culpa? Expedita aspernatur praesentium consectetur accusamus animi dicta aliquam non, minus, sunt laboriosam, totam amet commodi dolore libero obcaecati cupiditate illo saepe neque? Necessitatibus vitae harum iure dolorum id mollitia maxime quidem eveniet! Dolores, nostrum.</p> <p>Quam sit qui dicta eligendi iure totam dolorum provident, mollitia pariatur quidem soluta distinctio! Quas, error, expedita nemo itaque maiores possimus qui facere laudantium esse a ullam perspiciatis modi quia.</p>',
        'category_id' => 1,
        'user_id' => 2
    ]);
    Post::create([
        'title' => 'Aaaa',
        'slug' => 'aaa',
        'excrpt' => 'Lorem ipsum dolor sit amet perspiciatis unde amet excepturi placeat totam. Fugiat?',
        'content' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id nam necessitatibus error a reprehenderit ratione quo iste perspiciatis illo vitae, dolore omnis vero eum ullam, harum quibusdam</p> <p>consequatur molestiae corrupti sequi sapiente? Nisi nemo recusandae culpa? Expedita aspernatur praesentium consectetur accusamus animi dicta aliquam non, minus, sunt laboriosam, totam amet commodi dolore libero obcaecati cupiditate illo saepe neque? Necessitatibus vitae harum iure dolorum id mollitia maxime quidem eveniet! Dolores, nostrum.</p> <p>Quam sit qui dicta eligendi iure totam dolorum provident, mollitia pariatur quidem soluta distinctio! Quas, error, expedita nemo itaque maiores possimus qui facere laudantium esse a ullam perspiciatis modi quia.</p>',
        'category_id' => 2,
        'user_id' => 1
    ]);

    private static  $posts = [
        [
            'title' => 'First',
            'alt' => 'first',
            'author' => 'person 1',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus accusamus assumenda repellat deserunt nulla culpa asperiores eos, soluta, sequi, modi quidem quia quas consequatur ex libero non nostrum adipisci.'
        ],
        [
            'title' => 'Sec',
            'alt' => 'sec',
            'author' => 'person 2',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus accusamus assumenda repellat deserunt nulla culpa asperiores eos, soluta, sequi, modi quidem quia quas consequatur ex libero non nostrum adipisci.'
        ],
        [
            'title' => 'Third',
            'alt' => 'third',
            'author' => 'person 3',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus accusamus assumenda repellat deserunt nulla culpa asperiores eos, soluta, sequi, modi quidem quia quas consequatur ex libero non nostrum adipisci.'
        ],
        [
            'title' => 'Fourth',
            'alt' => 'fourth',
            'author' => 'person 4',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus accusamus assumenda repellat deserunt nulla culpa asperiores eos, soluta, sequi, modi quidem quia quas consequatur ex libero non nostrum adipisci.'
        ],
    ];


    public static function all()
    {
        return collect(self::$posts);
    }

    public static function find($alt)
    {
        $post = static::all();

        return $post->firstWhere('alt', $alt);
    }
}
