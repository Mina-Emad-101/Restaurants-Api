<?php

use Illuminate\Support\Facades\Route;

Route::get('/setup', function () {
    $credentials = [
        'email' => 'menamanos@gmail.com',
        'password' => 'password',
    ];

    if (! Auth::attempt($credentials)) {
        $user = new App\Models\User;

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = $credentials['password'];

        $user->save();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token');
        }
    }
});
