<?php
namespace App\Http\Controllers;

class UserController {
    public function show($user) {
        $users = [
            'one' => 'User one',
            'two' => 'User two'
        ];

        if( !array_key_exists($user, $users)) {
            abort(404, 'Sorry user not found.');
        }

        return view('user', [
            'user' => $users[$user]
        ]);
    }
}
