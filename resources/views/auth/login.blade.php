<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
    <body class="overflow-hidden">
        <form method="POST" action="{{ route('login') }}">
            @csrf

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
            <div class="flex bg-gradient-to-bl from-indigo-100 via-white justify-center items-center justify-self-center" style="height: 100vh">
                <div class="flex w-1/3 h-5 rounded border-8 justify-center items-center text-center p-6 flex-col" style="border-color: #4D4668; height: 500px; font-family: 'Roboto', sans-serif; ">
                    <h1 class="text-4xl font-black mb-8" style="color:#4D4668">Alto lá, identifique-se!</h1>

                    <div class="w-11/12 p-3 flex text-2xl">
                        <label for="email"class="p-4 ">Email:</label>
                        <input name="email" class="bg-transparent rounded-b-lg rounded-t-lg w-10/12 border-r-2 border-b-2 p-4 focus:outline-none" style="border-color: #37314E; " type="email" />
                    </div>

                    <div class="w-11/12 p-3 flex text-2xl">
                        <label for="password"class="p-4 ">Senha:</label>
                        <input name="password" class="bg-transparent w-10/12 rounded-b-lg rounded-t-lg border-r-2 border-b-2 p-4 focus:outline-none" style="border-color: #37314E; " type="password" />
                    </div>

                    <div class="w-full flex justify-around mt-8">
                        <div class="mt-12 text-black hover:text-gray-800">
                            <a href="/register">Quer entrar pro time?</a>
                        </div>
                        <div>
                            <button type="submit" class="py-5 px-12 text-white rounded-lg hover:opacity-75" style="background-color: #2B234A">
                                Entrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>





















{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label value="{{ __('Email') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label value="{{ __('Password') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label class="flex items-center">--}}
{{--                    <input type="checkbox" class="form-checkbox" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Login') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}
