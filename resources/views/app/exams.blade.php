<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Exámenes</title>
    <link rel="shortcut icon" href="{{ asset('storage/svg/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/preloader.js', 'resources/js/examu.js', 'resources/js/scroll.js'])
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    @include('templates.loader')

    <!-- Header -->
    <header class="w-full">
        @include('templates.header')
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-4 mt-6 lg:max-w-screen-2xl lg:mx-auto lg:rounded-md">
        <section class="flex flex-col lg:flex-row justify-between items-center mb-6">
            <div class="text-center lg:text-left">
                <h2 class="text-4xl font-bold text-vh-green mb-2">Especialidades Médicas</h2>
                <p class="text-sm text-gray-700">Los exámenes son necesarios para las citas</p>
            </div>
            <div class="sticky top-4">
                <button type="button" id="menu-buttone"
                    class="mt-4 lg:mt-0 bg-vh-green text-white font-semibold rounded-md px-4 py-2 shadow hover:bg-green-700 focus:ring-2 focus:ring-vh-green">
                    Exámenes Finalizados
                </button>
            </div>
        </section>

        <!-- Exámenes Pendientes -->
        <section id="pendientes" class="lg:px-16 lg:py-12">
            @if (isset($examenes) && $examenes->where('state', '1')->isEmpty())
                <div class="text-center py-8">
                    <p class="text-lg font-semibold text-gray-700">No tienes exámenes programados.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($examenes->where('state', '1') as $examen)
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Tipo de Examen</h3>
                            <p class="text-lg text-gray-700 mb-4">{{ $examen->exam_type ?? 'No disponible' }}</p>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Fecha</h4>
                            <p class="text-lg text-gray-700 mb-4">
                                {{ !empty($examen->exam_date) ? (new DateTime($examen->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                            </p>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Notas</h4>
                            <p class="text-base text-gray-600 mb-4">{{ $examen->notes ?? 'No disponible' }}</p>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Estado</h4>
                            <p class="text-base text-gray-600">{{ $examen->state == '1' ? 'Pendiente' : 'Finalizado' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Exámenes Finalizados -->
        <section id="finalizados" class="lg:px-16 lg:py-12 bg-gray-50 hidden">
            @if (isset($examenes) && $examenes->where('state', '0')->isEmpty())
                <div class="text-center py-8">
                    <p class="text-lg font-semibold text-gray-700">No tienes exámenes finalizados.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($examenes->where('state', '0') as $examen)
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Tipo de Examen</h3>
                            <p class="text-lg text-gray-700 mb-4">{{ $examen->exam_type ?? 'No disponible' }}</p>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Fecha</h4>
                            <p class="text-lg text-gray-700 mb-4">
                                {{ !empty($examen->exam_date) ? (new DateTime($examen->exam_date))->format('j \d\e F \d\e Y') : 'No disponible' }}
                            </p>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Notas</h4>
                            <p class="text-base text-gray-600">{{ $examen->notes ?? 'No disponible' }}</p>
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Estado</h4>
                            <p class="text-base text-gray-600">{{ $examen->state == '1' ? 'Pendiente' : 'Finalizado' }}
                            </p>
                            <button class="bg-slate-500 text-white p-1 mt-2">Resultados</button>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-auto">
        @include('templates.footer')
    </footer>

    <!-- Chat IA -->
    <div class="fixed bottom-0 right-0 p-4">
        @include('templates.chat_ia')
    </div>
</body>

</html>
