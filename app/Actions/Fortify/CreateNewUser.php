<?php

namespace App\Actions\Fortify;

use App\Models\Carrito;
use App\Models\DireccionUsuario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'numero' => ['required', 'string', 'max:10'],
            'direccion1' => ['required', 'string', 'max:255'],
            'provincia' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255'],
            'codigo_postal' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'celular' => $input['celular'],
            'telefono' => $input['telefono'],
        ])->assignRole('user');

        DireccionUsuario::create([
            'usuario_id' => $user->id,
            'numero' => $input['numero'],
            'direccion_1' => $input['direccion1'],
            'direccion_2' => $input['direccion2'],
            'provincia' => $input['provincia'],
            'localidad' => $input['localidad'],
            'codigo_postal' => $input['codigo_postal'],
        ]);
        Carrito::create([
            'usuario_id' => $user->id,
            'total_carrito' => 0,
        ]);
        return $user;
    }
}
