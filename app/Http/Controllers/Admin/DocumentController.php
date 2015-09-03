<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News\Publicacao;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\News\Document;
use App\Http\Requests\DocumentCreateRequest;
use App\Http\Requests\DocumentUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $docs = Publicacao::orderBy('created_at', 'desc')->where('flag_tipo', 'like', 'DC')->paginate(15);
        return view('admin.document.index', compact('docs'));
    }

    /**
     * view create
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.document.create');
    }

    /**
     * storage an document
     * @param DocumentRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(DocumentCreateRequest $request)
    {
        $request['flag_tipo'] = 'DC';
        $request['user_id'] = Auth::user()->id;

        if ($request->hasFile('file') && $request->file('file')->isValid())
        {
            if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx']))
            {
                $destinationPath = storage_path().'/document/';
                $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $fileName);

                $pub = Publicacao::create($request->all());

                $input['publicacao_id'] = $pub->id;
                $input['file'] = $fileName;

                $doc = Document::create($input);

                $pub->documento()->save($doc);

                return redirect(route('document.index'))->with([
                    'flash_type_message' => 'alert-success',
                    'flash_message' => 'Informações cadastradas com sucesso!'
                ]);
            }
        }
        return redirect(route('document.create'))->withInput();
    }

    /**
     * edit view document
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $doc = Publicacao::findOrFail($id);

        return view('admin.document.edit', compact('doc'));
    }

    /**
     * updates an document
     * @param $id
     * @param DocumentRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, DocumentUpdateRequest $request)
    {
        $pub = Publicacao::findOrFail($id);

        if($request->hasFile('file'))
        {
            if ($request->file('file')->isValid())
            {
                if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx', 'odt']))
                {
                    File::delete($pub->doc->file);

                    $destinationPath = storage_path().'/document/';
                    $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                    $request->file('file')->move($destinationPath, $fileName);

                    $input['file'] = $fileName;

                    $pub->update($request->all());

                    $pub->documento->update($input);

                    return redirect(route('document.index'))->with([
                        'flash_type_message' => 'alert-success',
                        'flash_message' => 'Informações atualizadas com sucesso!'
                    ]);
                }
                else
                {
                    return redirect(route('document.edit', $pub->id))->withInput();
                }
            }
            else
            {
                return redirect(route('document.edit', $pub->id))->withInput();
            }
        }

        $pub->update($request->all());

        return redirect(route('document.index'));
    }

    /**
     * show an document
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $doc = Publicacao::findOrFail($id);

        return view('admin.document.show', compact('doc'));
    }

    /**
     * Delete an document
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $pub = Publicacao::findOrFail($id);

        File::delete($pub->documento->file);
        $pub->delete();

        return redirect(route('document.index'))->with([
            'flash_type_message' => 'alert-success',
            'flash_message' => 'Informações removidas com sucesso!'
        ]);
    }

    public function download($id)
    {
        $pub = Publicacao::findOrFail($id);

        $file = storage_path('document').'/'.$pub->documento->file;

        return response()->download($file);
    }


}
