<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Http\Request;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required' , 'string'],
            'skype_pass' => ['required' , 'string'],
            'course' => ['required' , 'string'],
            'skype' => ['required' , 'string'],
            'description' => ['required', 'string'],
            'audio' => ['nullable', 'file' , 'mimes:audio/mpeg,mpga,mp3,wav,aac'],
            
        ])->validate();
        if($input['audio'] != Null)
        {
            $audio = $input['audio'];
            $name1 = uniqid(rand(999,99999)) . time().'.'.$audio->getClientOriginalExtension();
            $destinationPath1 = public_path('storage/uploads/audio');
            $audio->move($destinationPath1, $name1);
        }
        else
        {
            $name1 = Null;
        }
        

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
            'skype_pass' => $input['skype_pass'],
            'course' => $input['course'],
            'skype' => $input['skype'],
            'description' => $input['description'],
            'audio' => $name1,
        ]);
    }
}
