<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use App\Diaries;
use App\Categories;

class DiaryController extends Controller
{
    // View diary {id}
    public function viewdiary($id)
    {
        $diary = Diaries::where([
                                        ['id', $id],
                                        ['username', Auth::user()->username],
                                    ])
                                    ->first()
        ;
        $category = Diaries::find($diary->id)->category()->first();

        return view('user.viewdiary', ['diary' => $diary, 'category' => $category]);
    }

    // Edit diary {id}
    public function editdiary($id)
    {
        $diary = Diaries::where([
                                        ['id', $id],
                                        ['username', Auth::user()->username],
                                    ])
                                    ->first()
        ;
        $category = Diaries::find($diary->id)->category()->first();
        $allCategories = Categories::get();

        return view('user.editdiary', ['diary' => $diary, 'category' => $category, 'allCategories' => $allCategories]);
    }

    // Insert Request
    public function setData(Request $req)
    {
        // Validate Requests
        $this->validateData($req);

        DB::table('diaries')
                        ->insert([
                            'category_id' => $req->input('category'),
                            'title' => $req->input('mood_title'),
                            'content' => htmlspecialchars($req->input('content')),
                            'username' => Auth::user()->username,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ])
        ;

        return redirect()->route('home');
    }

    // Update Request
    public function updateData(Request $req, $id)
    {
        // Validate Requests
        $this->validateData($req);

        DB::table('diaries')
                        ->where([
                            ['id', $id],
                            ['username', Auth::user()->username],
                        ])
                        ->update([
                            'category_id' => $req->input('category'),
                            'title' => $req->input('mood_title'),
                            'content' => $req->input('content'),
                            'updated_at' => now(),
                        ])
        ;

        // View diary
        $diary = Diaries::where([
                                        ['id', $id],
                                        ['username', Auth::user()->username],
                                    ])
                                    ->first()
        ;
        $category = Diaries::find($diary->id)->category()->first();

        return redirect()->route('diary.view', ['id' => $diary->id])->with(
            ['diary', $diary],
            ['category' => $category]
        );
    }

    // Delete Request
    public function deleteData(Request $req, $id)
    {
    	DB::table('diaries')
                        ->where([
                            ['id', $id],
                            ['username', Auth::user()->username],
                        ])
			    		->delete()
		;

        return redirect()->route('home');
    }

    // Validations
    public function validateData(Request $req)
    {
    	$validator = Validator::make($req->all(), [
            'category' => 'required',
            'mood_title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
            			->route('diary')
                        ->withErrors($validator)
                        ->withInput();
        }

        return;
    }
}
