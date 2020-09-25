<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

    <body class="flex justify-between">
        <div class=" w-1/5 flex flex-col rounded  text-center" style="border-color: #4D4668; height: 61vh; font-family: 'Roboto', sans-serif; ">
            <div class=" flex flex-col rounded border-r-4 border-b-4 items-center justify-center text-center" style="border-color: #4D4668; height: 50vh; font-family: 'Roboto', sans-serif; ">
                <?php $faker = Faker\Factory::create(); ?>
                <img class="rounded-full w-8/12 " style="height: 200px" src="https://api.adorable.io/avatars/{{ $faker->randomNumber() }}/" alt="">


                <div class="mt-10">
                    <p>{{ Auth::user()->name }}</p>
                    <p>Bem vindo novamente!</p>
                    <p><a class="hover:text-purple-700" href="#">Editar Perfil</a> | <a class="hover:text-purple-700" href="#">Sair</a></p>
                </div>
            </div>
            <p class="text-sm mt-3 font-light">
                “The use of COBOL cripples the mind; its teaching should, therefore, be regarded as a criminal offense.”
                <br><span class="">― Edsger W. Dijkstra</span>
            </p>
        </div>
            <div class="flex w-3/5 h-5 mt-3 rounded border-4 justify-center items-center text-center flex-col" style="border-color: #4D4668; height: 61vh; font-family: 'Roboto', sans-serif; ">
                <div class="w-full flex flex-col">
                    <div class="flex py-4 border-b-4 border-gray-300 w-full">
                        <div class="flex w-4/12 text-lg border-r-4 font-bold justify-center ">
                            Descrição
                        </div>
                        <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                            Valor
                        </div>
                        <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                            Dia
                        </div>
                        <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                            Pago
                        </div>
                        <div class="flex w-2/12 text-lg font-bold justify-center ">
                            Opções
                        </div>
                    </div>
                    @foreach ($datas as $key => $data)
                        <div class="flex flex-wrap py-4 w-full
                                @if ( !$loop->last)
                                    border-b-2
                                @endif
                                border-gray-400 {{ ($key+1)%2 == 0 ? 'bg-gray-100' : ''}}">
                            <div class="flex w-4/12 text-md border-r-2 border-gray-400 justify-center ">
                                {{ $data['desc'] }}
                            </div>
                            <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                                R$ {{number_format((float)$data['price'], 2, ',', '')}}
                            </div>
                            <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                                {{ $data['date'] }}
                            </div>
                            <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                                <form method="post" action="">
                                    <input onclick="this.form.submit()" type="checkbox" {{ $data['paid'] ? 'checked' : ''}}>
                                </form>
                            </div>
                            <div class="flex w-2/12 text-md justify-center ">
                                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex w-2/12 h-5 mt-3 rounded justify-center items-center text-center p-6 flex-col" style="border-color: #4D4668; height: 500px; font-family: 'Roboto', sans-serif; ">
                <a href="#" class="py-3 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Nova conta
                </a>
                <a href="#" class="py-3 mt-2 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Nova Tarefa
                </a>
                <a href="#" class="py-3 mt-2 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Nova Guia
                </a>
                <a href="#" class="py-3 mt-2 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Contas
                </a>
                <a href="#" class="py-3 mt-2 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Tarefas
                </a>
                <a href="#" class="py-3 mt-2 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Guias
                </a>
            </div>
        </div>
    </body>
</html>
