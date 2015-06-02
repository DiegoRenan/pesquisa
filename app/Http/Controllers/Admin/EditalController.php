<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $editals = Edital::orderBy('started_at', 'desc')->paginate(5);
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
        $input = $request->all();
        $input['started_at'] = $request->started_at.' 00:00:00';
        $input['finished_at'] = $request->finished_at.' 00:00:00';
        $input['user_id'] = Auth::user()->id;

        if ($request->hasFile('file') && $request->file('file')->isValid())
        {
            if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx']))
            {
                $destinationPath = storage_path().'/edital/';
                $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move($destinationPath, $fileName);

                $input['file'] = $fileName;

                Edital::create($input);

                return redirect(route('edital.index'));
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
        $edital = Edital::find($id);

        if(is_null($edital))
            abort(404);

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
        $edital = Edital::find($id);

        if(is_null($edital))
            abort(404);

        if($request->hasFile('file'))
        {
            if ($request->file('file')->isValid())
            {
                if(in_array($request->file('file')->getClientOriginalExtension(), ['pdf', 'doc', 'docx', 'odt']))
                {
                    File::delete($edital->file);

                    $destinationPath = storage_path().'/edital/';
                    $fileName = str_random(15).'.'.$request->file('file')->getClientOriginalExtension();
                    $request->file('file')->move($destinationPath, $fileName);

                    $input = $request->all();
                    $input['file'] = $fileName;

                    unset($input['_token']);
                    unset($input['_method']);

                    $input['started_at'].=' 00:00:00';
                    $input['finished_at'].=' 00:00:00';

                    $edital->update($input);

                    return redirect(route('edital.index'));
                }
                else
                {
                    return redirect(route('edital.edit', $edital->id))->withInput();
                }
            }
            else
            {
                return redirect(route('edital.edit', $edital->id))->withInput();
            }
        }

        $input = $request->all();

        unset($input['_token']);
        unset($input['_method']);

        $input['started_at'].=' 00:00:00';
        $input['finished_at'].=' 00:00:00';

        $edital->update($input);

        return redirect(route('edital.index'));
    }

    /**
     * show an edital
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $edital = Edital::find($id);

        if(is_null($edital))
            abort(404);

        return view('admin.edital.show', compact('edital'));
    }

    /**
     * Delete an edital
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $edital = Edital::find($id);

        if(is_null($edital))
            abort(404);

        File::delete($edital->file);
        $edital->delete();

        return redirect(route('edital.index'));
    }

    public function download($id)
    {
        $edital = Edital::find($id);

        if(is_null($edital))
            abort(404);

        $file = storage_path('edital').'/'.$edital->file;

        return response()->download($file);
    }

}
