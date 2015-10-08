<?php namespace App\Http\Controllers\Research;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectController extends Controller {

	public function dadosPessoais()
    {
        return view('research.project.create');
    }

}
