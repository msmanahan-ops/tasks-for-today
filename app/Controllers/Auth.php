<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('user_id')) {
            return redirect()->to('/tasks');
        }

        return view('auth/login');
    }

    public function attempt()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', 'Enter your username and password.');
        }

        $user = (new UserModel())
            ->where('username', trim((string) $this->request->getPost('username')))
            ->first();

        if (
            $user === null
            || empty($user['password'])
            || ! password_verify(
                (string) $this->request->getPost('password'),
                $user['password']
            )
        ) {
            return redirect()->back()->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->regenerate();

        session()->set([
            'user_id'  => $user['id'],
            'username' => $user['username'],
        ]);

        return redirect()->to('/tasks');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}