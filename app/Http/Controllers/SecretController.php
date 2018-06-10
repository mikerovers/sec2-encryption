<?php

namespace App\Http\Controllers;

use App\Secret;
use Illuminate\Http\Request;

class SecretController extends Controller
{
	private $method = "aes-256-ctr";

    public function postEncryptMessage(Request $request)
    {
    	$message = $request->message;
	    $nonceSize = openssl_cipher_iv_length($this->method);
	    $nonce = openssl_random_pseudo_bytes($nonceSize);
    	$key = hash('md5', $request->name . $request->password);

	    $encrypted = openssl_encrypt(
		    $message,
		    $this->method,
		    $key,
		    OPENSSL_RAW_DATA,
		    $nonce
	    );

	    $encrypted = base64_encode($nonce . $encrypted);

	    $secret = new Secret();
		$secret->message = $encrypted;
		$secret->save();

	    $request->session()->flash('status', 'Message encrypted with id: ' . $secret->id);

	    return view('welcome');
    }

	public function postDecryptMessage(Request $request)
	{
		$secret = Secret::find($request->id);

		if (!$secret) {
			$request->session()->flash('status', 'Secret nog found.');

			return view('welcome');
		}

		$message = base64_decode($secret->message, true);
		$key = hash('md5', $request->name . $request->password);
		$nonceSize = openssl_cipher_iv_length($this->method);
		$nonce = mb_substr($message, 0, $nonceSize, '8bit');
		$ciphertext = mb_substr($message, $nonceSize, null, '8bit');

		$plaintext = openssl_decrypt(
			$ciphertext,
			$this->method,
			$key,
			OPENSSL_RAW_DATA,
			$nonce
		);

		$request->session()->flash('status', 'Message: ' . $plaintext);

		return view('welcome');
	}
}
