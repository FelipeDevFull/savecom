<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePostInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PostInfo;
use Dflydev\DotAccessData\Data;

class PainelController extends Controller
{
  
  
  public function index(PostInfo $PostInfo)
  {
    $user_id = Auth::id();
    $Result_posts = PostInfo::where('user_id', $user_id)->latest()->get();
    return view('painel.home.index', compact('Result_posts'));
  }

  
  
  public function create()
  {
    return view ('painel.home.create');
  }

  
  
  public function store(StoreUpdatePostInfo $request)
  { 
    
    $Data = $request->all();
    $Data['user_id'] = Auth::id();
    $DataTitle       = $Data['title'];
    //Impede o usuário logado de cadastrar títulos iguais.
    $Title_existe    = PostInfo::where('title', $DataTitle)->where('user_id', $Data['user_id'])->first();
    if($Title_existe) {
      $status['error'] = 'Esse Titulo já Existe.';
      echo json_encode($status);
      return false;
    }else{
      $status['sucess'] = 'sucess';
    }
    echo json_encode($status);
    PostInfo::create($Data);
   
  }

  
  
  
  public function edit(string $id)
  {
    if(!$Result_edit = PostInfo::find($id))
    {
      return back();
    }
    return view('painel.home.edit', compact('Result_edit'));
  }

  
  
  
  public function update(StoreUpdatePostInfo $request , PostInfo $PostInfo  ,string $id)
  { 
    //$update = $request->all();
    $update = $PostInfo->find($id);
    //id da infomação não existe.
    if(!$update)
    {
      // return back();
      $status['error'] = 'Error';
      echo json_encode($status);
      return false; 
    }
    //validated() = retorna os apenas os dados validados.
    $update->update($request->validated());
    $status['errors'] = 'redirect';
    echo json_encode($status);      
    //return redirect()->route('PainelController.index');
  }



  public function destroy(string $id)
  {
    if(!$delete = PostInfo::find($id))
    {
      return back();
    }
    $delete->delete();
    return redirect()->route('PainelController.index');
  }

  public function search(Request $request, PostInfo $PostInfo)
  {
    
    // $Result_posts = $PostInfo->search($request->date);
    $userid_auth = Auth::id();
    $date = $request->date;
    if($date){
      $Result_posts = PostInfo::where('date', $request->date)->where('user_id', $userid_auth)->latest()->get();
      if (count($Result_posts) === 0) {
        $Result_posts = 'error';
      }
    }else{
      $Result_posts = PostInfo::where('user_id',  $userid_auth)->latest()->get();
    }
    // return view('painel.home.index', compact('Result_posts', 'status'));
    return view('painel.home.index', ['Result_posts' => $Result_posts]);
  }

}
