<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Controlador de autenticación con JWT.
 * 
 * Maneja el inicio de sesión, la obtención de información del usuario autenticado,
 * el cierre de sesión y la renovación del token.
 */
class AuthController extends Controller
{
    /**
     * Inicia sesión y genera un token JWT.
     * 
     * @param Request $request La solicitud HTTP con email y password.
     * @return \Illuminate\Http\JsonResponse Respuesta con el token o error de autenticación.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        try{
            $credentials = request(['email', 'password']);

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'las credenciales no coinciden con nuestros registros'], 401);
            }
            return $this->respondWithToken($token);       
        }catch(JWTException $e){
            return response()->json(['message'=>'No se puede crear el token de acceso',$e->getMessage()],401);
        }
    }

    /**
     * Obtiene los datos del usuario autenticado.
     * 
     * @return \Illuminate\Http\JsonResponse Respuesta con los datos del usuario autenticado.
     */
    public function me()
    {
        return response()->json(Auth::user());
    }

    /**
     * Cierra la sesión del usuario y revoca el token JWT.
     * 
     * @return \Illuminate\Http\JsonResponse Respuesta con mensaje de cierre de sesión exitoso.
     */
    public function logout()
    {
        Auth::guard()->logout();
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresca el token JWT y devuelve uno nuevo.
     * 
     * @return \Illuminate\Http\JsonResponse Respuesta con un nuevo token.
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh());
    }

    /**
     * Devuelve una respuesta con el token JWT.
     * 
     * @param string $token El token generado.
     * @return \Illuminate\Http\JsonResponse Respuesta con el token y sus detalles.
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
