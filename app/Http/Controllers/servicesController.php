<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Auth;
use Session;
use Redirect;
use DB;
use App\Services;
use App\categories;


class servicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request)
       {
         $query=trim($request->get('searchText'));
         $servicios=DB::table('services')
         ->join('categories', 'categories.id', '=', 'services.categories_id')
         ->select('services.*','categories.categoria')
         ->where('services.nombre','LIKE','%'.$query.'%')
         ->orWhere('services.descripcion','LIKE','%'.$query.'%')
         ->get();

      return view('services.index',['servicios'=> $servicios,'searchText'=>$query]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin()
    {
      $services = Services::paginate(10);
      return view('services.admin',['services'=> $services]);
    }

    public function create()
    {
        $categorias = categories::All();
        return view('services.create',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $services = request()->except('_token');

        if($request->hasFile('foto')){

          $services['foto']=$request->file('foto')->store('uploads','public');

        }

        Services::insert($services);

        Session::flash('message','Haz agreado una nuevo servicio satisfactoriamente');
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = categories::All();

        $services = DB::table('categories')
            ->join('services', 'categories.id', '=', 'services.categories_id')
            ->select('categories.*','services.*')
            ->where('services.id', '=', $id)
            ->first();

        return view('services.edit',['services' => $services, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $services = request()->except(['_token','_method']);

        if($request->hasFile('foto')){

          $service = Services::findOrFail($id);
          Storage::delete('public/'.$service->foto);
          $services['foto']=$request->file('foto')->store('uploads','public');

        }

        Services::where('id','=', $id)->update($services);
        Session::flash('message','El servicio se ha actualizado correctamente');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Services::destroy($id);
      Session::flash('message','El servicio se ha eliminado satisfactoriamente');
      return redirect('/admin');
    }

    public function hospedaje(){

      $servicios=DB::table('services')
      ->join('categories', 'categories.id', '=', 'services.categories_id')
      ->select('services.*','categories.categoria')
      ->where('categories.categoria','=','Hospedaje y turismo')
      ->get();

      return view('services.hospedaje',['servicios' => $servicios]);

    }

    public function moda(){

      $servicios=DB::table('services')
      ->join('categories', 'categories.id', '=', 'services.categories_id')
      ->select('services.*','categories.categoria')
      ->where('categories.categoria','=','Moda y accesorios')
      ->get();

      return view('services.moda',['servicios' => $servicios]);
    }

    public function salud(){

      $servicios=DB::table('services')
      ->join('categories', 'categories.id', '=', 'services.categories_id')
      ->select('services.*','categories.categoria')
      ->where('categories.categoria','=','Salud y belleza')
      ->get();

      return view('services.salud',['servicios' => $servicios]);
    }

    public function educacion(){
      $servicios=DB::table('services')
      ->join('categories', 'categories.id', '=', 'services.categories_id')
      ->select('services.*','categories.categoria')
      ->where('categories.categoria','=','Educación y más')
      ->get();

      return view('services.educacion',['servicios' => $servicios]);
    }

    public function alimentos(){

      $servicios=DB::table('services')
      ->join('categories', 'categories.id', '=', 'services.categories_id')
      ->select('services.*','categories.categoria')
      ->where('categories.categoria','=','Alimentos')
      ->get();

      return view('services.alimentos',['servicios' => $servicios]);
    }

    public function artesanias(){
      $servicios=DB::table('services')
      ->join('categories', 'categories.id', '=', 'services.categories_id')
      ->select('services.*','categories.categoria')
      ->where('categories.categoria','=','Artesanias')
      ->get();

      return view('services.artesanias',['servicios' => $servicios]);
    }

    public function mascotas(){
      $servicios=DB::table('services')
      ->join('categories', 'categories.id', '=', 'services.categories_id')
      ->select('services.*','categories.categoria')
      ->where('categories.categoria','=','Mascotas')
      ->get();

      return view('services.mascotas',['servicios' => $servicios]);
    }

   public function oficios(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Oficios')
     ->get();

     return view('services.oficios',['servicios' => $servicios]);
   }

   public function entretenimiento(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Entretenimiento y cultura')
     ->get();

     return view('services.entretenimiento',['servicios' => $servicios]);
   }

   public function oficinas(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Oficinas')
     ->get();

     return view('services.oficinas',['servicios' => $servicios]);
   }

   public function deportes(){

     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Deportes')
     ->get();

     return view('services.deportes',['servicios' => $servicios]);
   }

   public function transporte(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Transporte')
     ->get();

     return view('services.transporte',['servicios' => $servicios]);
   }

   public function changarros(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Changarros')
     ->get();

     return view('services.changarros',['servicios' => $servicios]);
   }

   public function departamentos(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Cuartos y terrrenos')
     ->get();

     return view('services.departamentos',['servicios' => $servicios]);
   }

   public function carpinterias(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Carpintería')
     ->get();

     return view('services.carpinterias',['servicios' => $servicios]);
   }

   public function emergencias(){
    $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Emergencias')
     ->get();

     return view('services.emergencias',['servicios' => $servicios]);
   }

   public function otros(){
     $servicios=DB::table('services')
     ->join('categories', 'categories.id', '=', 'services.categories_id')
     ->select('services.*','categories.categoria')
     ->where('categories.categoria','=','Otros')
     ->get();

     return view('services.otros',['servicios' => $servicios]);
   }
}
