<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use Socialite;
use App\Models\User;
use App\Models\PasswordReset;


class AuthController extends Controller
{
	// use AuthenticatesUsers;

	protected $redirectTo = RouteServiceProvider::HOME;

	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function register(Request $request)
	{
		$nama_lengkap = $request->nama_lengkap;
		$email = $request->email;
		$telepon = $request->telepon;
		$password = password_hash($request->password, PASSWORD_DEFAULT);
		$token = base64_encode(md5(sha1(random_bytes(10))));

		$request->validate([
			'email' => 'unique:users|email',
			'telepon' => 'required',
			'nama_lengkap' => 'required'
		]);

		PasswordReset::create([
			'email' => $email,
			'token' => $token
		]);

		User::create([
			'nama_lengkap' => $nama_lengkap,
			'email' => $email,
			'password' => $password,
			'telepon' => $telepon
		]);

		$this->_sendEmail($token, 'verify');

		return redirect('/')->with('message', "<script>Swal.fire('Wooww', 'Registrasi sukses, harap periksa email anda!', 'success')</script>");
	}

	public function verify()
	{
		$email = $_GET['email'];
		$token = $_GET['token'];

		$user = User::where('email', $email)->first();

		if ($user) {
			$user_token = PasswordReset::where('email', $email)->first();

			if ($user_token) {
				if (date("d-m-Y H:i:s", strtotime($user_token->created_at)) - date('d-m-Y H:i:s')) {
					User::where('email', $user->email)->update([
						'google_id' => 1
					]);

					PasswordReset::destroy($user_token->email);

					return redirect('/')->with('message', "<script>Swal.fire('Wooww', 'Akun berhasil terverifikasi, silahkan login.', 'success')</script>");
				} else {
					return redirect('/')->with('message', "<script>Swal.fire('Wooww', 'Akun gagal verifikasi, token expired!', 'error')</script>");
				}
			} else {
				return redirect('/')->with('message', "<script>Swal.fire('Wooww', 'Akun gagal verifikasi, token salah!', 'error')</script>");
			}
		} else {
			return redirect('/')->with('message', "<script>Swal.fire('Wooww', 'Akun gagal verifikasi, email salah!', 'error')</script>");
		}
	}

	private function _sendEmail($token, $type)
	{
		if ($type == "verify") {
			\Mail::to($_POST['email'])->send(new \App\Mail\SendMail($token));
		} elseif ($type == "forgot") {
			\Mail::to($_POST['email'])->send(new \App\Mail\Forgot_mail($token));
		} else {
			return redirect('/')->with('message', "<script>Swal.fire('Ooops', 'Error.', 'error')</script>");
		}
	}

	public function google()
	{
		return Socialite::driver('google')->redirect();
	}

	public function google_callback()
	{
		try {

			$user = Socialite::driver('google')->stateless()->user();

			$isUser = User::where('google_id', $user->id)->first();

			if($isUser){

				Auth::login($isUser);
				Session::put('logged_in', $isUser);
				return redirect('/');

			} else {
				$createUser = new User;
				$createUser->nama_lengkap =  $user->getName();

				if($user->getEmail() != null){
					$createUser->email = $user->getEmail();
					$createUser->email_verified_at = \Carbon\Carbon::now();
				}  

				$createUser->google_id = $user->getId();

				$rand = rand(111111,999999);
				$createUser->password = Hash::make($user->getName().$rand);

				$createUser->save();

				Auth::login($createUser);
				Session::put('logged_in', $createUser);
				return redirect('/');
			}

		} catch (Exception $exception) {
			dd($exception->getMessage());
		}
	}

	public function logout()
	{
		Session::flush();
		return redirect('/');
	}
}
