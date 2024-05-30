<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Celular') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" inputmode="numeric" name='celular' placeholder="264" required  />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Telefono fijo (Opcional)') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" inputmode="numeric" name="telefono" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Numero de calle') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" inputmode="numeric" name="numero"  required  />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Direccion 1') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="direccion1"  required  />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Direccion 2 (Opcional)') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="direccion2"  />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Codigo postal') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" inputmode="numeric" name="codigo_postal"  required  />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Localidad') }}" />
                <x-input id="email" class="block mt-1 w-full " type="text" name="localidad"  required  />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Provincia') }}" />
                <select id="provincia" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="provincia"  required>
                    <option value="1">BUENOS AIRES</option>
                    <option value="2">CATAMARCA</option>
                    <option value="5">CHACO</option>
                    <option value="6">CHUBUT</option>
                    <option value="3">CORDOBA</option>
                    <option value="4">CORRIENTES</option>
                    <option value="7">ENTRE RIOS</option>
                    <option value="8">FORMOSA</option>
                    <option value="9">JUJUY</option>
                    <option value="10">LA PAMPA</option>
                    <option value="11">LA RIOJA</option>
                    <option value="12">MENDOZA</option>
                    <option value="13">MISIONES</option>
                    <option value="14">NEUQUEN</option>
                    <option value="15">RIO NEGRO</option>
                    <option value="16">SALTA</option>
                    <option value="17">SAN LUIS</option>
                    <option value="19">SANTA CRUZ</option>
                    <option value="20">SANTA FE</option>
                    <option value="21">SANTIAGO DEL ESTERO</option>
                    <option value="22">TIERRA DEL FUEGO</option>
                    <option value="23">SAN JUAN</option>
                    <option disabled="true" selected="true" value="">Seleccionar una Provincia</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required  />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required  />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
