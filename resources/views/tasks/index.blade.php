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
<div class="flex flex-col items-center justify-center">
    <div class="flex w-11/12 h-5 mt-3 rounded border-4 text-center flex-col " style="border-color: #4D4668; height: 70vh; font-family: 'Roboto', sans-serif; ">
        <div class="w-full flex flex-col">
            <div class="flex py-4 border-b-4 border-gray-300 w-full">
                <div class="flex w-4/12 text-lg border-r-4 font-bold justify-center ">
                    Descrição
                </div>
                <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                    Começo
                </div>
                <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                    Dia Final
                </div>
                <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                    Feito?
                </div>
                <div class="flex w-2/12 text-lg font-bold justify-center ">
                    Opções
                </div>
            </div>
            @foreach ($tasks as $key => $data)
                <div class="flex flex-wrap py-4 w-full
                    @if ( !$loop->last)
                        border-b-2
                    @endif
                    border-gray-400 {{ ($key+1)%2 == 0 ? 'bg-gray-100' : ''}}">
                    <div class="flex w-4/12 text-md border-r-2 border-gray-400 justify-center ">
                        {{ $data['desc'] }}
                    </div>
                    <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                        {{ $data['created_at'] }}
                    </div>
                    <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                        {{ $data['finalWeekDate'] }}
                    </div>
                    <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                        {{ $data['done'] }}/{{ $data['total'] }}
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
    <div class="flex w-8/12 h-5 mt-3 rounded border-4 items-center text-center flex-col mb-5" style="height: 35vh; border-color: #4D4668; font-family: 'Roboto', sans-serif;">
        <div class="text-3xl mt-5 font-bold" style="color: #4D4668">Cadastro de Tasks Semanais</div>
        <form method="post" action="{{route('task.weeklyStore')}}">
            @method('post') @csrf
            <div class="flex w-12/12 mt-5 justify-center align-center items-center">
                <label class="p-3" >Descrição:</label>
                <input class="p-3 bg-gray-100 border-black rounded border-r-2 border-b-2 w-8/12" name="desc" />
            </div>


            <div class="flex flex-row w-12/12 ">
                <div>
                    <label class="mr-5">Dia que começa:</label>
                    <input class="bg-gray-100 mt-3 rounded" type="date" name="finalWeekDate" />
                </div>
                <div class="ml-6">
                    <label class="mr-5">Dia que termina:</label>
                    <input class="bg-gray-100 mt-3 rounded" type="date" name="created_at" />
                </div>
            </div>

            <button class="mt-5 p-3 rounded px-8 bg-gray-100" type="submit">Enviar</button>
        </form>
    </div>
</div>

</body>
</html>
