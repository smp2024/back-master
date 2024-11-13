<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
Use App\Mail\UserSendRecover, App\Mail\UserSendNewPassword, App\Mail\UserSendVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Redirect;

class ConnectController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin()
    {
       \Session::put("url.intended",URL::previous());

        return view('autenticacion.login');

    }

    public function postLogin(Request $request)
    {

        $rules = [
    		'email'                             => 'required|email',
    		'password'                          => 'required|min:8',
        ];

        $messages = [
            'email.required'                    => 'Su correo electrónico es requerido.',
            'email.email'                       => 'El formato de su correo electrónico es invalido.',
            'password.required'                 => 'Por favor escriba una contraseña.',
            'password.min'                      => 'La contraseña debe tener al menos 8 caracteres.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)):
                if(Auth::user()->status == "0" || Auth::user()->status == "100"):
                    return redirect('/logout');
                else:

                        //     return redirect()->back();
                        return redirect()->intended("/");
                        //return Redirect::to(\Session::get("url.intended"));

                endif;

            else:

                return back()->with('message','correo electrónico o contraseña incorresctos.')->with('typealert','danger');

            endif;

        endif;

    }

    public function getRegister()
    {

        return view('autenticacion.register');

    }

    public function postRegister(Request $request)
    {

    	$rules = [
            'name'                              => 'required',
            'lastname'                          => 'required',
    		'email'                             => 'required|email|unique:users,email',
    		'password'                          => 'required|min:8',
    		'cpassword'                         => 'required|min:8|same:password',
        ];

        $messages = [

            'name.required'                     => 'Su nombre es requerido.',
            'lastname.required'                 => 'Sus apellidos son requeridos.',
            'phone.required'                    => 'Su numero de celular es necesario',
            'email.required'                    => 'Su correo electrónico es requerido.',
            'email.email'                       => 'El formato de su correo electrónico es invalido.',
            'email.unique'                      => 'Existe un usuario registrado con este correo electronico.',
            'password.required'                 => 'Por favor escriba una contraseña.',
            'password.min'                      => 'La contraseña debe tener al menos 8 caracteres.',
            'cpassword.required'                => 'Es necesario confirmar la contraseña',
            'cpassword.min'                     => 'La confirmación de la contraseña debe tener al menos 8 caracteres.',
            'cpassword.same'                    => 'Las contraseñas no coinciden'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();

        else:

            $code = rand(100000, 999999);
            $user = new User;
            $user ->name            = e($request->input('name'));
            $user ->lastname        = e($request->input('lastname'));
            $user ->email           = e($request->input('email'));
            $user ->password        = Hash::make($request->input('password'));
            $user->verification_code= $code;

            $data = ['name' => $user->name, 'email' => $user->email, 'code' => $code];

            if($user->save()):

                Mail::to($user->email)->queue(new UserSendVerification($data));
                $userf = User::where('email', $user->email)->first();
                return view('emails.sendn', compact('userf'));

            endif;

        endif;

    }

    public function getLogout()
    {

        $status = Auth::user()->status;
        Auth::logout();
        if($status == "100"):
            return redirect('/login')->with('message', ' Tu usuario esta suspendido.')->with('typealert', 'danger');
        else:
            return redirect('/');
        endif;

    }


    public function getRecover()
    {

        return view('autenticacion.recover');

    }

    public function postRecover(Request $request)
    {


    	$rules = [
    		'email'                             => 'required|email',
        ];

        $messages = [
            'email.required'                    => 'Su correo electrónico es requerido.',
            'email.email'                       => 'El formato de su correo electrónico es invalido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $user = User::where('email', $request->input('email'))->count();

            if($user == "1"):

                $user = User::where('email', $request->input('email'))->first();
                $code = rand(100000, 999999);
                $data = ['name' => $user->name, 'email' => $user->email, 'code' => $code];
                $u = User::find($user->id);
                $u->password_code = $code;
                if($u->save()):
                    Mail::to($user->email)->queue(new UserSendRecover($data));
                    return redirect('/reset?email='.$user->email)->with('message', 'Ingrese el codigo qye le hemos enviado a su correo electrónico.')->with('typealert', 'success');
                endif;
            else:

                return Back()->with('message', ' Este correo electrónico no éxiste.')->with('typealert', 'success');

            endif;

        endif;

    }

    public function getReset(Request $request)
    {

        $data = ['email' => $request->get('email')];
        return view('autenticacion.reset', $data);

    }

    public function postReset(Request $request)
    {

        $rules = [
            'email'                             => 'required|email',
            'code'                              => 'required'
        ];

        $messages = [
            'email.required'                    => 'Su correo electrónico es requerido.',
            'email.email'                       => 'El formato de su correo electrónico es invalido.',
            'code.required'                     => 'El codigo de recuperación es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->count();

            if($user == "1"):

                $user = User::where('email', $request->input('email'))->where('password_code', $request->input('code'))->first();
                $new_password = Str::random(8);
                $user->password = Hash::make($new_password);
                $user->password_code = null;

                if( $user->save()):
                    $data = ['name' => $user->name, 'password' => $new_password];
                    Mail::to($user->email)->queue(new UserSendNewPassword($data));
                    return view('autenticacion.send', $data);
                endif;

            else:
                return Back()->with('message', 'El correo electrónico o el codigo de recuperación son erroneos.')->with('typealert', 'success');
            endif;

        endif;

    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->user();

        // $user->token;
    }

    public function getVerification(Request $request)
    {


        $data = ['email' => $request->get('email')];

        return view('autenticacion.verification', $data);
    }

    public function postVerification(Request $request)
    {

        $rules = [
            'code'                              => 'required'
        ];

        $messages = [
            'code.required'                     => 'El codigo de verificación es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()):

            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            $user = User::where('verification_code', $request->input('code'))->count();

            if($user == "1"):

                $user = User::where('verification_code', $request->input('code'))->first();

                $user->status = "1";

                if($user->save()):
                    return view('emails.check');
                endif;

            else:
                return Back()->with('message', 'El correo electrónico o el codigo de recuperación son erroneos.')->with('typealert', 'success');
            endif;

        endif;
    }


}
