<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;
use DB;

class BannerController extends Controller
{
    public function index()
    {
      $banners = DB::table('banner')->where('deleted_at','=', NULL)->orderBy('ordem','ASC')->get();

      return view('admin.banner.index', ['banners' => $banners]);
    }

    public function BannerOrdem(){
      $banners = DB::table('banner')->orderBy('ordem','ASC')->get();
      $bannerID = Input::get('bannerID');
      $bannerIndex = Input::get('bannerIndex');

      foreach ($banners as $banner) {
        return DB::table('banner')->where('id','=',$bannerID)->update(array('ordem' => $bannerIndex));
      }
    }

    public function create()
    {
      return view('admin.depoimento.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
      'caminho'        => 'sometimes|image|mimes:jpeg,png,jpg',

      ));
        $banners = new Banner;
        $banners->texto       = $request->texto;
        $banners->link        = $request->link;
        $banners->titulo        = $request->titulo;
        $banners->ordem        = $request->ordem;
        $banners->video  = $request->video;
        $banners->corbotao    = $request->corbotao;
        $banners->lado        = $request->lado;

        if ($request->hasFile('caminho')) {
            $image = $request->file('caminho');
            $filename = time() . '.' . $image->getClientOriginalName();
            $location = public_path('uploads/banners/' . $filename);
            Image::make($image)->save($location);
            $banners->caminho = $filename;
        }
        if($banners->textobotao == NULL){
          $banners->textobotao = "Saiba Mais";
        }

        $banners->save();
        $request->session()->flash('success', 'Banner adicionado com sucesso');
        return redirect('admin/banners')->with('flash_message', 'Banner adicionado!');
    }

    public function edit($id , Request $request)
    {
      $banners = Banner::findOrFail($id);
      return view('admin.banner.edit', ['banners' => $banners]);
    }

    public function update(Request $request, $id)
    {
      $banners = Banner::find($id);
      $this->validate($request, array(
      'caminho'        => 'sometimes|image|mimes:jpeg,png,jpg',
      ));

      $banners->fill($request->all());

      if ($request->hasFile('caminho')) {
        $image = $request->file('caminho');
        $filename = time() . '.' . $image->getClientOriginalName();
        $location = public_path('uploads/banners/' . $filename);
        Image::make($image)->save($location);

        if ($banners->capa) {
          $oldFilename = $banners->capa;
          Storage::delete('uploads/banners/'.$oldFilename);
        }
        $banners->caminho = $filename;
        }
        $banners->save();
        $request->session()->flash('success', 'Banner foi modificado com sucesso');
        return redirect('admin/banners');
    }

    public function destroy($id)
    {
      $banners = Banner::find($id)->delete();
      return [response()->json("success")];
    }
}
