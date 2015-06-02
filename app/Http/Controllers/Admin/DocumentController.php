<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $docs = Document::orderBy('created_at', 'desc')->paginate(5);
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
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if ($request->hasFile('file') && $request->file('file')->isValid())
        {
            if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx']))
            {
                $destinationPath = storage_path().'/document/';
                $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $fileName);

                $input['file'] = $fileName;

                Document::create($input);

                return redirect(route('document.index'));
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
        $doc = Document::find($id);

        if(is_null($doc))
            abort(404);

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
        $doc = Document::find($id);

        if(is_null($doc))
            abort(404);

        if($request->hasFile('file'))
        {
            if ($request->file('file')->isValid())
            {
                if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx', 'odt']))
                {
                    File::delete($doc->file);

                    $destinationPath = storage_path().'/document/';
                    $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                    $request->file('file')->move($destinationPath, $fileName);

                    $input = $request->all();
                    $input['file'] = $fileName;

                    unset($input['_token']);
                    unset($input['_method']);

                    $doc->update($input);

                    return redirect(route('document.index'));
                }
                else
                {
                    return redirect(route('document.edit', $doc->id))->withInput();
                }
            }
            else
            {
                return redirect(route('document.edit', $doc->id))->withInput();
            }
        }

        $input = $request->all();

        unset($input['_token']);
        unset($input['_method']);

        $doc->update($input);

        return redirect(route('document.index'));
    }

    /**
     * show an document
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $doc = Document::find($id);

        if(is_null($doc))
            abort(404);

        return view('admin.document.show', compact('doc'));
    }

    /**
     * Delete an document
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $doc = Document::find($id);

        if(is_null($doc))
            abort(404);

        File::delete($doc->file);
        $doc->delete();

        return redirect(route('document.index'));
    }

    public function download($id)
    {
        $doc = Document::find($id);

        if(is_null($doc))
            abort(404);

        $file = storage_path('document').'/'.$doc->file;

        return response()->download($file);
    }


}
