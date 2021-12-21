<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Post;
use App\Rubric;
use App\Tag;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use function Doctrine\Common\Cache\Psr6\get;

class HomeController extends Controller
{

    public function index(Request $request)
    {
       // Cache::put('key', 'Value', 60);
       // Cache::flush();

        /*if(Cache::has('posts'))
        {
            $posts = Cache::get('posts');
        }
        else{
            $posts = Post::query()->orderBy('id', 'DESC')->get();
            Cache::put('posts', $posts);
        }*/


        //dump(Cache::get('key'));
        //Cookie::queue('test', 'Test cookie', 5, '/');
      // dump(Cookie::get('test'));

      //  Cookie::queue(Cookie::forget('test6'));

        /*$request->session()->put('test', 'value');
        session(['cart' => [
            ['id' => 1, 'title' => 'Product 1'],
            ['id' => 2, 'title' => 'Product 2']
        ]]);*/

        //dump(session('cart')[0]);
       // session()->put('test', 'value');
        //session()->push('cart', ['id' => 3, 'title' => 'Product 3']);
       // dump(session()->all());

        $title  = 'Home Page 6';
        $h1  = '<h1>Home Page 6</h1>';
        $data1 = range(1,20);
        $data2 = [ 'title' => 'Title',
                    'content' => 'Content',
                    'keys' => 'Keywords'
            ];

        $posts = Post::query()->orderBy('created_at', 'DESC')->paginate(3);

      //  \Debugbar::warning($posts);
        Log::info('Hello');

        return view('home', compact('title', 'h1', 'data1', 'data2', 'posts'));
/*
        for ($i=1; $i <10; $i++)
        {
            Post::query()->create([
                    'title' => 'Статья '.$i,
                    'content' => 'Статья '.$i.' This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.'
                ]);

        }*/

       /* $cityDB = new City();
        $countryDB = new Country();
        $postDB = new Post();
        $rubricDB = new Rubric();

       $tag = Tag::find(1);
        dump($tag->title);
        foreach ($tag->posts as $post)
        {
            dump($post->title);
        }*/


        /*$posts = Post::with('rubric')->where('id', '>', 1)->get();
        foreach ($posts as $post) {
            dump($post->title, $post->rubric->title);
        }*/
         //$rubricDB->title = 'Рубрика 4';
        /* $rubric =  $rubricDB->find(1)->posts()->select('title')->where('id', '>', '2')->get();
        dump($rubric);*/
        //dump($rubric,$rubric->posts);
        // dump($rubric->post->title, $rubric->title);
       // $rubricDB->save();

       /* $data = Country::all();
        dd($data);*/

        //$data = Country::query()->limit(3)->get();
        //$data = Country::where('Code', '<', 'ALB')->select('Code', 'Name')->get();
       // $data = $cityDB->find(5);
     //   $data2 = $countryDB->find('AGO');

       // $postDB->title = 'Статья 4';
      //  $postDB->content = 'Lorem ipsum 4';
       // $postDB->save();

      //  Post::query()->create(['title' => 'Статья 5', 'content' => 'Lorem ipsum 5']);
     /*   $postDB->fill(['title' => 'Статья 6', 'content' => 'Lorem ipsum 6']);
        $postDB->save();*/
/*
        $post = Post::query()->find(6);
        $post->content  = '';
        $post->save();*/

       // Post::where('id', '>', 3)->update(['updated_at' => NOW()]);

     //   $post = Post::query()->find(2);
       /// dd($post->delete());
       // $postDB->delete();

     //  Post::destroy(4);

       /* $post = new Post();
        $post->title = "Статья 2";*/
     //   $post->content = "Контент статьи 1";
      //  $post->save();


        //$data = DB::table('country')->select('Code', 'Name')->orderBy('Name', 'DESC')->limit(5)->get(); //->first(); //
       // $data = DB::table('city')->select('ID', 'Name')->where('id', '=', '2')->get(); // >find('20');

      /*  $data = DB::table('city')->select()->where([
            ['id', '>', 3],
            ['id', '<', 7],
        ])->get();*/
       // $data = DB::table('country')->limit(10)->pluck('Name', 'Code');
       // $data = DB::table('country')->count();
      //  $data = DB::table('country')->max('Population');
    //    $data = DB::table('country')->avg('Population');
     //   $data = DB::table('city')->select('CountryCode')->distinct()->get();
/*
        $data = DB::table('city')->select('city.ID', 'city.Name as city_name', 'country.Code', 'country.Name AS country_name')
            ->limit(10)->join('country', 'city.CountryCode', '=', 'country.Code')
            ->orderBy('city.ID', 'ASC')->get();*/


      //  return dd($data);



        /*$query = DB::insert("INSERT INTO posts (title, content) VALUES(?,?)", ['Статья 3', 'Lorem ipsum 3']);
        dd($query);*/

        /*
       DB::update("UPDATE posts SET created_at = ?, updated_at = ? WHERE created_at IS NULL OR updated_at IS NULL",
           [NOW(), NOW()]);
        */

       /* DB::delete("DELETE FROM posts WHERE id = :id", ['id' => 2]);*/

       /*  Transaction

       DB::beginTransaction();
        try{
            DB::update("UPDATE posts SET created_at = ? WHERE created_at IS NULL", [NOW()]);
            DB::update("UPDATE posts SET updated_at = ? WHERE updated_at IS NULL", [NOW()]);
            DB::commit();
        }
        catch(\Exception $ex){
            DB::rollBack();
            echo $ex->getMessage();
        }
       */



      /*  $posts = DB::select("SELECT * FROM posts WHERE id > :id", ['id' => 0]);
        return dd($posts);*/

       /* dump($_ENV);
        echo env('APP_DEBUG');
        echo config('app.timezone');
        echo config('database.connections.mysql.charset');*/
       // return view('home', ['res' => 5]);
    }

    public function test()
    {
        return 'test';
    }

    public function create()
    {
        $title = 'Create Post';
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('create', compact('title', 'rubrics'));
    }

    public function store( Request $request)
    {
        /*dump($request->input('title'));
        dump($request->input('content'));
        dd($request->input('rubric_id'));*/
//        dd($request->all());
        $rules = [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer'
        ];

       // $request->validate($rules);

        $messages = [
            'title.required' => 'Заполните название статьи'
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        Post::create($request->all());
        session()->flash('success', 'Данные сохранены');
        return redirect()->route('home');
    }


}
