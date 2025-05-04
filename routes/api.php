<?php

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::controller(AuthController::class)->prefix("auth")->middleware('api')->group(function () {
    Route::post('login', 'login')->name('auth.login'); 
    Route::post('register', 'register')->name('auth.register');
    Route::post('refresh', 'refresh')->name('auth.refresh');

    Route::middleware('jwt.auth.token')->group(function () {
        Route::post("logout","logout")->name('auth.logout');
        Route::get('user-profile', 'userProfile')->name('auth.user.profile');
        Route::post("send-registration-invite", "sendRegistrationInvite")->name('auth.sendRegistrationInvite');
        //->middleware(['role:Admin']) rreshti i 16 
    });
});

    //Route::get('test-api-endpoint',function(){
    //    return response()->json({'message' => 'API endpoint is working!'});
    // });

     Route::post('test-mail-sent',function(Request $request){
        try {
            $mailData = [
                'title' => 'Email Title',
                'message' => 'This is a test e-mail message.',
                'session_title' => $request->session_title,
            ];
            Mail::to('berishasuela60@gmail.com')->send(new TestMail($mailData));

            return 'success';
        } catch (\Exceotion $e) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'type' => class_basename($e),               ]
           ], 500);
        }
    });