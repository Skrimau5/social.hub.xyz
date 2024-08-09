<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostsController extends Controller
{
    /**
     * Carga las publicaciones ya guardadas.
     */
    public function index()
    {
        session_start();
    
        if ($_SESSION != null) {
            $session = session()->get('key');
    
            foreach ($session as $value) {
                $id = $value['id'];
            }
    
            // Obtener posts por estado
            $postsProgrammed = Posts::latest()->where('user_id', $id)->where('status', 'Programmed')->paginate(12)->withQueryString();
            $postsQueue = Posts::latest()->where('user_id', $id)->where('status', 'Queue')->paginate(12)->withQueryString();
            $postsNow = Posts::latest()->where('user_id', $id)->where('status', 'Now')->paginate(12)->withQueryString();
            
    
            return view('posts.index', compact('postsProgrammed', 'postsQueue', 'postsNow'));
        } else {
            return redirect('/');
        }
    }
    
    /**
     * Genera una vista a la ventana de creacion de publicaciones.
     */
    public function create()
    {
        //Trae todas los dias de la base de datos.
        $days = Days::all();

        //Direcciona a la vista del la pagina
        return view('newPosts', compact('days'));
    }


    public function store(Request $request)
    {
        $message = "¡Guardado con éxito!";
            
        $dataUsers = request()->except('_token') + [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    
        $insertUsers  = Posts::insert($dataUsers); 

        if ($insertUsers) {
            return redirect('/posts')->with('status', $message);  
        }
    }

  
}
