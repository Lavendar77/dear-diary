<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Validation\Rule;
use Auth;

class SettingsController extends Controller
{
	// Requests
    public function setData(Request $req)
    {
    	// Validate Requests
    	$this->validateData($req);

    	if (Hash::check($req->input('oldPassword'), Auth::user()->password)) {

			// Update 'theme'
	    	DB::table('users')
				    		->where('username', Auth::user()->username)
				    		->update(['theme' => $req->input('theme')])
	    	;

            // Update 'profile'
            DB::table('diaries')
				    		->where('username', Auth::user()->username)
                            ->update(['username' => $req->input('username')])
	    	;
            DB::table('users')
                            ->where('username', Auth::user()->username)
                            ->update([
                                'name' => $req->input('name'), 
                                'username' => $req->input('username')
                            ])
            ;
    	}

    	return redirect()->route('settings');
    }

    public function validateData(Request $req) {
    	$validator = Validator::make($req->all(), [
            'theme' => 'required',
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                Rule::unique('users')->ignore(Auth::user()->id)
            ],
       		'oldPassword' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
            			->route('settings')
                        ->withErrors($validator)
                        ->withInput();
        }

        return;
    }
}
