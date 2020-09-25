<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex bg-gradient-to-bl from-indigo-100 via-white justify-center items-center justify-self-center" style="height: 100vh">
            <div class="flex w-1/3 h-5 rounded border-8 justify-center items-center text-center p-6 flex-col" style="border-color: #4D4668; min-height: 90vh; font-family: 'Roboto', sans-serif; overflow: hidden ">
                <h1 class="text-4xl font-black mb-8" style="color:#4D4668">Alto lá, identifique-se!</h1>

                <div class="w-11/12 p-3 flex text-2xl">
                    <label for="name"class="p-4 ">Nome:</label>
                    <input name="name" class="bg-transparent rounded-b-lg rounded-t-lg w-10/12 border-r-2 border-b-2 p-4 focus:outline-none" :value="old('name')" required autofocus style="border-color: #37314E; " type="name" />
                </div>

                <div class="w-11/12 p-3 flex text-2xl">
                    <label for="email"class="p-4 ">Email:</label>
                    <input name="email"  class="bg-transparent rounded-b-lg rounded-t-lg w-10/12 border-r-2 border-b-2 p-4 focus:outline-none"  :value="old('email')" style="border-color: #37314E; " type="email" />
                </div>

                <div class="w-11/12 p-3 flex text-2xl">
                    <label for="password"class="p-4 ">Senha:</label>
                    <input name="password" class="bg-transparent w-10/12 rounded-b-lg rounded-t-lg border-r-2 border-b-2 p-4 focus:outline-none" style="border-color: #37314E; " type="password" />
                </div>

                <div class="w-11/12 p-3 flex text-2xl">
                    <label for="password_confirmation"class="p-4 ">Repita:</label>
                    <input name="password_confirmation" class="bg-transparent w-10/12 rounded-b-lg rounded-t-lg border-r-2 border-b-2 p-4 focus:outline-none" style="border-color: #37314E; " type="password" />
                </div>

                <x-jet-validation-errors class="mb-4" />

                <div class="w-full flex justify-around mt-8">
                    <div class="mt-12 text-black hover:text-gray-800">
                        <a href="/login">Voltar</a>
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
<</body>
