<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\activities_responses;
use App\Models\Atividades;
use App\Models\Disciplines;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AtividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        // dd($id);
        $users = User::find(Auth::user()->id);
        $activities = activities_responses::where('user_id', $users->id)->get();
        $disciplinasID = Disciplines::find($id);
        $idProfessor = Auth::user()->id;
        if (Auth::user()->roles_id == 1 ) {
            $atividades = Activities::where('teacher_id', $idProfessor)->where('discipline_id', $id)->get();

            return view('atividades.index', compact('atividades', 'disciplinasID'));
        } else {
            $atividades = Activities::with('activity')->where('discipline_id', $id)->get();
        //     foreach($atividades as $atividade){
        // echo $atividade->activity;
        //     }
            $users = User::find(Auth::user()->id);
            $activities = activities_responses::where('user_id', $users->id)->get()->map( function($item) {
                return $item->activities_id;
            })->toArray();
            return view('atividades.index', compact('atividades', 'disciplinasID', 'users', 'activities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $disciplinasID = $id;
        return view('atividades.create', compact('disciplinasID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $idProfessor = Auth::user()->id;

        $atividade = Activities::create([
            'teacher_id' => $idProfessor,
            'discipline_id' => $id,
            'name' => $request->name,
            'filepath' => '..',
            'description' => $request->description,
            'status' => 1,
        ]);



        $filepath = "public/professores/{$idProfessor}/atividades/{$atividade->id}.html";

        Storage::disk('local')->put($filepath, $request->filepath);

        $atividade->update(['filepath' => $filepath]);

        return redirect()->route('atividades.index', compact('id'));
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

        $atividade = Activities::find($id);
        return view('atividades.edit', compact('atividade'));
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
        $dados = Activities::find($id);
        $id = $dados->discipline_id;
        $teste = $request->filepath->store('produtos', 'public');
        $dados->update([
            'name' => $request->name,
            'filepath' => $teste,
            'description' => $request->description,
        ]);
        return redirect()->route('atividades.index', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dadosAtividades = Activities::find($id);
        $dadosAtividades->delete();
        return redirect()->back();
    }
    public function ckeditor()
    {
        return view('atividades.editor');
    }
    public function retornarActivities($id)
    {
        $dadosActivities = Activities::find($id);
        $fileContent = Storage::get($dadosActivities->filepath);
        return view('atividades.editor', compact('fileContent'));
    }
    public function createResposta($id){
        $atividadeID = Activities::find($id);
        return view('atividades.resposta', compact('atividadeID'));
    }
    public function resposta(Request $request, $id){
        $request->filepath = $request->filepath->store('produtos', 'public');
$aluno = Auth::user()->id;
        activities_responses::create([
            'activities_id' => $id,
            'user_id' => $aluno,
            'check' => 0,
            'filepath' => $request->filepath,
            'description' => $request->description,
        ]);
        $activities = Activities::find($id);
        $activities->update(['status' => 2]);
        $id = $activities->discipline_id;
        return to_route('atividades.index', compact('id'));
    }
}
