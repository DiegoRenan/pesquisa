<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\Publicacao;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\News\Edital;
use App\Http\Requests\EditalCreateRequest;
use App\Http\Requests\EditalUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EditalController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editals = Publicacao::orderBy('created_at', 'desc')->where('flag_tipo', 'like', 'ED')->paginate(15);
        return view('admin.edital.index', compact('editals'));
    }

    /**
     * view create
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.edital.create');
    }

    /**
     * storage an edital
     * @param EditalRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EditalCreateRequest $request)
    {
       // $input = $request->all();
        $request['started_at'] = $request->started_at.' 00:00:00';
        $request['finished_at'] = $request->finished_at.' 00:00:00';
        $request['flag_tipo'] = 'ED';
        $request['user_id'] = Auth::user()->id;

        if ($request->hasFile('file') && $request->file('file')->isValid())
        {
            if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx']))
            {
                $destinationPath = storage_path().'/edital/';
                $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $fileName);

                $pub = Publicacao::create($request->all());

                $input['publicacao_id'] = $pub->id;
                $input['started_at'] = $request['started_at'];
                $input['finished_at'] = $request['finished_at'];
                $input['file'] = $fileName;

                $edital = Edital::create($input);

                $pub->edital()->save($edital);

                return redirect(route('edital.index'))->with([
                    'flash_type_message' => 'alert-success',
                    'flash_message' => 'Informações cadastradas com sucesso!'
                ]);
            }
        }
        return redirect(route('edital.create'))->withInput();
    }

    /**
     * edit view edital
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $edital = Publicacao::findOrFail($id);


        return view('admin.edital.edit', compact('edital'));
    }

    /**
     * updates an edital
     * @param $id
     * @param EditalRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, EditalUpdateRequest $request)
    {
        $pub = Publicacao::findOrFail($id);

        if($request->hasFile('file'))
        {
            if ($request->file('file')->isValid())
            {
                if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx', 'odt']))
                {
                    File::delete($pub->edital->file);

                    $destinationPath = storage_path().'/edital/';
                    $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                    $request->file('file')->move($destinationPath, $fileName);

                    $pub->update($request->all());

                    $input['started_at'] = $request['started_at'];
                    $input['finished_at'] = $request['finished_at'];
                    $input['file'] = $fileName;

                    $pub->edital->update($input);

                    return redirect(route('edital.index'))->with([
                        'flash_type_message' => 'alert-success',
                        'flash_message' => 'Informações atualizadas com sucesso!'
                    ]);
                }
                else
                {
                    return redirect(route('edital.edit', $pub->id))->withInput();
                }
            }
            else
            {
                return redirect(route('edital.edit', $pub->id))->withInput();
            }
        }

        $pub->update($request->all());

        $input['started_at'] = $request['started_at'];
        $input['finished_at'] = $request['finished_at'];

        $pub->edital->update($input);

        return redirect(route('edital.index'));
    }

    /**
     * show an edital
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $edital = Publicacao::findOrFail($id);

        return view('admin.edital.show', compact('edital'));
    }

    /**
     * Delete an edital
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $pub = Publicacao::findOrFail($id);

        File::delete($pub->edital->file);

        $pub->delete();

        return redirect(route('edital.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
    }

    public function download($id)
    {
        $pub = Publicacao::findOrFail($id);

        $file = storage_path('edital').'/'.$pub->edital->file;

        return response()->download($file);
    }

}
