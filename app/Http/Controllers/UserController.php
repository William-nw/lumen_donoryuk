<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function _getUser(Request $request)
    {
        // check username & pass
        $auth = DB::table('users')->where([
            ['username', '=', $request->username],
            ['password', '=', $request->password],
        ])->first();

        
        if($auth != null){
            return response()->json(['status' => 'success', 'data' => $auth],200);
        }else{
            return response()->json(['status' => 'fail', 'data' => $auth],404);
        }

    }

    public function _insertUser(Request $request)
    {
        try {
            // insert data
            $insert = DB::table('users')->insert([
                'username' => $request->username,
                'password' => $request->password,
                'nama' => $request->nama,
                'golongan_darah' => $request->golongan_darah,
                'rhesus' => $request->rhesus,
                'lokasi' => $request->lokasi,
                'no_hp' => $request->no_hp,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['status' => 'success'],200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'fail'],404);
            
        }
        
    }

    public function _updateUser(Request $request)
    {
        // check username & pass
        $updated = DB::table('users')
        ->where('id', $request->id)
        ->update([
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'golongan_darah' => $request->golongan_darah,
            'rhesus' => $request->rhesus,
            'lokasi' => $request->lokasi,
            'no_hp' => $request->no_hp,
            'updated_at' => Carbon::now(),
        ]);

        
        if($insert != null){
            return response()->json(['status' => 'success', 'data' => $updated],200);
        }else{
            return response()->json(['status' => 'fail', 'data' => $updated],404);
        }

    }
    

    
}
