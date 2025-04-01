<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make(
        $input,
        [
            'name' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique(User::class),
            ],
            'password' => ['required']
        ],
        [
            'name.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
        ]
        )->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        session(['redirect_after_register' => route('register.step2')]);

        return $user;
    }
}
