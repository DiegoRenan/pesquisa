<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsCreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' =>  'required|min:3|max:200',
            'source'    =>  'max:200',
            'url'   =>  'max:255',
            'content'   =>  'required|min:10',
            'publicated_at' =>  'required'
		];
	}

}
