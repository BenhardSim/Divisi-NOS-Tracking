<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    //
    public function index(){
        return view('portal.setting', [
            'title' => 'Setting'
        ]);
    }
    public function update(Request $request)
    {
        //
        $rules = [
            'password' => 'required',
            'new' => 'required',
        ];

        if(!Hash::check($request->password, auth()->user()->password)){
            return redirect('/setting')->with('updateError', 'Password lama salah');
        }
        if($request->new == $request->password){
            return redirect('/setting')->with('duplicateError', 'Password baru dan lama sama');
        }
        $validatedData =  $request->validate($rules);

        $finalData = [
            'password' => bcrypt($validatedData['new'])
        ];
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body) , 50, '...');

        User::where('id', auth()->user()->id)->update($finalData);

        return redirect('/setting')->with('toast_success', 'Password berhasil diperbarui');
    }
}
