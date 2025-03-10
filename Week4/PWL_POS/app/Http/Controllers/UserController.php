<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {

        $user = UserModel::create([
                'username' => 'manager11',
                'name' => 'Manager11',
                'password' => Hash::make('12345'),
                'level_id' => 2,
            
    ]);
        $user->username = 'manager12';

        $user->save();

        $user->wasChanged(); // True
        $user->wasChanged('username'); // True
        $user->wasChanged('username', 'level_id'); // True
        $user->wasChanged('name'); // False
        dd($user->wasChanged('name', 'username')); // True

    }
}
