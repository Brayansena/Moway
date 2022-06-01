<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if (Auth::attempt($request->only('email','password'))) {
            return response()->json([
            'message'=>'usuario creado',
            'token'=>$request->user()->createToken($request->email)
            ->plainTextToken,
            ]);
        }
    }

    public function login(Request $request){
        //validamos los datos
        if (!Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'message'=>'Datos incorrectos',
                'success'=> false
            ], 200);
        }
        //valiido sii el token es el mismo y si no loe s
        //creo nuevo token
        $userToken = Token::where('name',$request->email)->first();
        if ($userToken) {
            $userToken->delete();
        }
        return response()->json([
                'success'=> true,
                'token'=>$request->user()->createToken($request->email)->plainTextToken,
                'message'=>'Te loguaste con exito'
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'token delete sucefull',
        ], 410);
    }
}
