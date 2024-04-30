<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio</title>
    @vite(['resources/css/app.css','resources/css/checkbox.css'])
    <!-- @vite(['resources/js/app.js']) not used now  -->
</head>
<body class="w-full h-full">
    <div class="flex">
        <div class="ml-auto lg:ml-auto">
            <div class="bg-gray-100 mt-28 rounded h-32 w-36 absolute z-20">
                <p class="pl-4 text-xl font-bold">Area</p>
                <div class="flex flex-col pl-4 mt-1">
                    <span class="text-lg">Activa</span>
                    <span class="text-lg">Personal</span>
                    <span class="text-lg">Personalizado</span>
                </div>
            </div>
        </div>
        <div class="ml-auto lg:ml-auto">
            <div class="ml-14 mt-5 absolute z-10">
                <img class="h-56 lg:h-full" src="{{asset('storage/svg/doctor.svg')}}" type="image/svg+xml"/>
            </div>
        </div>
        <div class="ml-auto mt-12 lg:ml-auto">
            <div class="bg-vh-green-light opacity-60 rounded-full h-60 w-60">
                <span class="invisible">a</span>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <div class="w-64">
            <div class="flex flex-col ml-4 mt-2 mb-2">
                <span class="font-bold text-lg">Area de Cardiologia</span>
                <span class="font-bold text-lg">Justo a tu Alcanze!!</span>
                <span class=" font-bold text-sm">Administración de Area designada</span>
            </div>
            <div class="my-5">
                <p class="text-xs text-justify mb-4 font-bold text-gray-400 mx-4 -mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <a href="/#" target="_self" class="w-4/5 h-9 text-white font-bold bg-vh-green text-sm shadow-xl mb-10 rounded-full lg:w-2/5 hover:bg-white transition duration-300 hover:text-vh-green inline-block text-center py-2 mx-4">
                Solicitar Cita
            </a>
        </div>
    </div>
    <div class="flex justify-center text-center flex-col items-center">
        <div class="w-full h-auto">
            <div>
                <h2 class="font-bold text-2xl">Areas de Apoyo</h2>
                <h2 class="font-bold text-2xl text-vh-green">Brindadas al Paciente</h2>
            </div>
            <div class="w-full flex grow-0 flex-wrap items-center justify-center mb-8">
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Citas</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut ex id exercitationem amet unde aliquam, nihil, assumenda libero, atque veritatis pariatur nesciunt ipsam voluptatum blanditiis iure est dolor laudantium. Facere.</p>
                    <hr class="mx-6 my-2">
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <!--Solo falta el pop-up-->
                    <a href="/#" target="_self" class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">Agendar</a>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Expedientes</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut ex id exercitationem amet unde aliquam, nihil, assumenda libero, atque veritatis pariatur nesciunt ipsam voluptatum blanditiis iure est dolor laudantium. Facere.</p>
                    <hr class="mx-6 my-2">
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self" class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">Observar</a>
                </div>
                <div class="w-full min-w-40 max-w-72 mx-4 border border-solid border-vh-green py-4 my-4">
                    <h2 class="text-lg font-bold mb-2">Programación</h2>
                    <p class="text-sm font-bold text-gray-400 mt-2 px-6 text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut ex id exercitationem amet unde aliquam, nihil, assumenda libero, atque veritatis pariatur nesciunt ipsam voluptatum blanditiis iure est dolor laudantium. Facere.</p>
                    <hr class="mx-6 my-2">
                    <div class="flex flex-col px-8">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 1</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 2</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 3</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 checkbox-custom">
                            <span class="ml-2">Opción 4</span>
                        </label>
                    </div>
                    <a href="/#" target="_self" class="w-4/5 py-4 my-4 border border-solid border-vh-green font-bold text-base lg:w-2/5 hover:bg-vh-green transition duration-300 hover:text-white inline-block text-center">Observar</a>
                </div>
            </div>
        </div>


        <!--Segundo Bloque-->
        <div class="w-full text-center mb-8">
            <div class="mb-2">
                <h2 class="font-bold text-2xl text-vh-green">Doctores de Area</h2>
            </div>
            <div class="w-full h-auto flex flex-wrap items-center justify-center mt-4">
                <div class="w-80 max-w-72 my-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                                <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Juan</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-80 max-w-72 my-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                                <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Epico Palo</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-80 max-w-72 my-4 bg-vh-green-light opacity-80 rounded-xl flex">
                    <div class="ml-8 mt-8 lg:ml-auto">
                        <div class="bg-vh-green-medium rounded-full h-16 w-16">
                                <span class="invisible">a</span>
                        </div>
                    </div>
                    <div class="flex flex-col pl-4 mt-5 mx-auto">
                        <h3 class="font-bold text-2xl">Alvarenga</h3>
                        <p>Matematics</p>
                        <div class="w-28 flex justify-around my-4 lg:ml-auto">
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                            <div class="bg-vh-green-medium rounded-full h-10 w-10">
                                <span class="invisible">a</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>