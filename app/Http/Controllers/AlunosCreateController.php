<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\activities_responses;
use App\Models\Disciplines;
use App\Models\Students;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlunosCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $disciplinas = Disciplines::all();
        // if (!empty($request->all())) {

        //     $statusDisciplina = $request->disciplinas;
        //     $atividades = Activities::with(['activity' => function ($query) use ($id) {
        //         $query->where('user_id', $id);
        //     }])->where('discipline_id', $statusDisciplina)->get();
        //     return response()->json($atividades);
        //     // return view('alunos.atividades', compact('disciplinas', 'atividades'));
        //     // dd($atividades->toArray());
        // }

        $atividades = activities_responses::with('activityModel')->where('user_id', $id)->orderBy('check', 'desc')->get();
        $atividadesNotes = activities_responses::where('user_id', $id)->where('note', '!=', null)->get()->map(function ($item) {
            return $item->id;
        })->toArray();

        return view('alunos.atividades', compact('disciplinas', 'atividades', 'atividadesNotes'));
        return view('alunos.atividades');
    }

    public function visualizarImage($id)
    {
        $imageActive = activities_responses::find($id);
        return $imageActive;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }
    public function createAluno(Request $request)
    {
        $dados = $request->except(['_token']);
        User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => $dados['password'] = Hash::make($dados['password']),
            'active' => 1,
            'roles_id' => 2,
        ]);
        redirect()->route('disciplines.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('disciplines.index');
        }
        return redirect()->back()->with('msg', 'Sua credenciais estão incorretas!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->manipulador == 2) {

            $atividadesFeitasCount = activities_responses::where('user_id', $id)->count();
            return $atividadesFeitasCount;
        } else {
            $atividadesFeitasCount = activities_responses::where('user_id', $id)->where('check', 1)->count();
            $atividades = Activities::where('status', 2)->get();
            return $atividadesFeitasCount;
            return $atividades;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atividades = activities_responses::find($id);
        return view('alunos.edit', compact('atividades'));
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
        $atividades = activities_responses::find($id);
        $imagem = $request->filepath->store('produtos', 'public');
        $atividades->update([
            'filepath' =>   $imagem,
            'description' => $request->description
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atividades = activities_responses::find($id)->delete();
    }
}
