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

    <body>
    <div class="flex justify-between">
        <div class=" w-1/5 flex flex-col rounded  text-center" style="border-color: #4D4668; height: 61vh; font-family: 'Roboto', sans-serif; ">
            <div class=" flex flex-col rounded border-r-4 border-b-4 items-center justify-center text-center" style="border-color: #4D4668; height: 50vh; font-family: 'Roboto', sans-serif; ">
                <?php $faker = Faker\Factory::create(); ?>
                <img class="rounded-full w-8/12 " style="height: 200px" src="https://api.adorable.io/avatars/{{ $faker->randomNumber() }}/" alt="">


                <div class="mt-10">
                    <p>{{ Auth::user()->name }}</p>
                    <p>Bem vindo novamente!</p>
                    <p><a class="hover:text-purple-700" href="#">Editar Perfil</a></p>

                        <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a onclick="event.preventDefault(); this.closest('form').submit();" class="hover:text-purple-700" href="#">Sair</a>
                    </form>
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
                                <div class="dropdown inline-block relative">
                                    <a  onclick="myFunction({{$key}})" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                    <ul id="dropdown-menu{{$key}}" class="dropdown-menu absolute text-gray-700 pt-1" style="display: none">
                                        <li class=""><a class="rounded-t bg-gray-100 hover:bg-gray-200 py-2 px-4 block whitespace-no-wrap" href="#">Editar</a></li>
                                        <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Deletar</a></li>
                                    </ul>
                                </div>

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
                <a href="{{ route('tasks.index') }}" class="py-3 mt-2 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Tarefas
                </a>
                <a href="#" class="py-3 mt-2 text-white rounded-lg text-2xl hover:opacity-75" style="width:200px; background-color: #2B234A">
                    Guias
                </a>
            </div>
        </div>
    </div>
    <div id="tasks" class="flex w-full justify-around  mt-5 mb-5" style="height: 80vh;">
        <div class="w-5/12 flex flex-col border-4" style="border-color: #4D4668;">
            <div class="flex flex-wrap py-4 w-full text-2xl font-bold justify-center" style="color: #4D4668;">Desafios Diários da Semana</div>
            <div class="flex flex-col-reverse">
                @foreach ($tasks as $key => $data)
                    <div class="flex flex-wrap py-4 w-full
                        @if ( !$loop->last)
                        border-b-2
    @endif
                        border-gray-400 {{ ($key+1)%2 == 0 ? 'bg-gray-100' : ''}}">
                        <div class="flex w-6/12 text-md border-r-2 border-gray-400 justify-center ">
                            {{ $data->desc }}
                        </div>

                        <div class="flex w-2/12 text-md border-r-2 text-center border-gray-400 justify-center ">
                            {{ date('d-m', strtotime($data  ->updated_at)) }}
                        </div>
                        <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                            <form method="post" action="{{ route('task.toggle_completed', $data->id) }}">
                                @method('POST') @csrf
                                <input onclick="this.form.submit()" type="checkbox" {{ $data->completed ? 'checked' : ''}}>
                            </form>
                        </div>
                        <form class="flex w-2/12 text-sm justify-center" method="POST" action="{{ route('task.delete')}}">
                            @method('POST') @csrf
                            <input name='id' value="{{ $data->id }}" style="display: none;"/>
                            <button onclick="this.form.submit()" href="#"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
            <form class="flex w-full" method="POST" action="{{ route('task.store')}}">
                @method('POST') @csrf
                <div class="flex flex-wrap w-full py-4 bg-gray-100 justify-around">
                    <input name="desc" class="flex w-8/12 text-md bg-gray-100 py-4 px-4 focus:outline-none" placeholder="Digite sua tarefa aqui..." />
                    <button class="flex w-2/12 text-md bg-teal-500 text-white text-bold py-4 px-4 focus:outline-none" type="submit">
                        Adicionar
                    </button>
                </div>
            </form>
        </div>


    <div class="w-5/12 border-4" style="border-color: #4D4668;">



    </div>
    </body>
<script>
    const handleClickOutside = (event, number) => {

    }

    function myFunction(number) {
        let x = document.getElementById("dropdown-menu"+number);

        if (x.style.display === "none") {
            x.style.display = "block";
            setTimeout(() => { document.addEventListener('click', function handleClickOutside(e, number) {        let modal = document.getElementById("dropdown-menu"+number);
                console.log('entrou')
                if (modal !=(e.target)) {
                    modal.style.display = 'none';
                    document.removeEventListener('click', handleClickOutside, false);
                }}, false) }, 200);
        } else {
            x.style.display = "none";
        }
    }
</script>
</html>


