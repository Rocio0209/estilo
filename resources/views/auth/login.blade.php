<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            @if (config('app.vedaelectoral'))
                <img src="{{ asset('img/Logo_bco.png') }}" style="width: 80px">
            @else
                <img src="{{ asset('img/Logo_bco.png') }}" class="d-none d-md-block bg-logo" style="width:250px;"/>
                <img src="{{ asset('img/mujer.png') }}" class="d-none d-md-block bg-mujer" style="width:150px;"/>
                <div class="d-flex d-md-none justify-content-center align-items-center line">
                    <img src="{{ asset('img/Logo_bco.png') }}" class="bg-logo2" style="width:250px;"/>
                </div>
            @endif
            <div class="line2">
                <h4 class="text-center text-white txt-shadow">DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN</h4>
                <h2 class="text-center text-white txt-shadow">{{ config('app.name', 'Plantilla IMSS Bienestar') }}</h2>
            </div>
            
        </x-slot>

        <x-slot name="titulo">
            <div class="bg-institucionalfondo" style="border-radius: 10px 10px 0 0"><h2 class="text-black my-0 px-3 font-institucional-b mt-2" >Iniciar Sesión</h2></div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label-black for="username" value="{{ __('Usuario') }}" />
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-text"><img src="{{ env('CDNIMB') }}img/User.png" style="width:30px;"/></div>
                        <input type="text" class="form-control bgo-institucional4" id="username" name="username" :value="old('username')"  required autofocus autocomplete="username" placeholder="">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <x-label-black for="password" value="{{ __('Password') }}" />
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-text"><img src="{{ env('CDNIMB') }}img/Password.png" style="width:30px;"/></div>
                        <input type="password" class="form-control bgo-institucional4" id="password" name="password" required autocomplete="current-password" placeholder="">
                    </div>
                </div>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-black">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-black hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        <b>{{ __('Forgot your password?') }}</b>
                    </a>
                @endif

                <x-button class="ml-4" >

                    <div class="text-black">Entrar</div> <img src="{{ env('CDNIMB') }}img/Entrar.png" style="height: 25px; margin-left:10px;"/>
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
