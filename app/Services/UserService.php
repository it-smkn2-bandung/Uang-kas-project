<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    public function store(array $data)
    {
        return $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'user_role' => $data['user_role']
        ]);
    }
    /**
     * Update
     */
    public function update(array $data, $id)
    {
        $user = User::find($id);
        $user->update($data);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
}
