
<x-app-layout>
    <div class="flex min-h-screen" style="background-color: #380462;">

        <!-- Menu lateral -->
        <aside class="w-64 text-white flex flex-col" style="background-color: #380462;">

            <div class="p-6 text-center border-b border-purple-800">
                <h1 class="text-xl font-bold text-white">
                    Óptica García
                </h1>

                <p class="text-sm mt-1 text-white">
                    Sistema de Registro de Pacientes
                </p>
            </div>

            <nav class="mt-9 flex-1">

    <a href="{{ route('dashboard') }}"
   class="block mx-3 my-2 px-6 py-3 text-white text-center rounded border border-white hover:bg-purple-800">
    Inicio
</a>
            
                </a>

            </nav>

            <!-- Salir -->
            <div class="p-6 border-t border-transparent" style="margin-bottom: 50px;">
    <form method="POST" action="{{ route('logout') }}" style="margin-top: -15px;">
        @csrf

   <button type="submit"
        class="w-full text-left text-white hover:text-purple-300 px-3 py-2 border border-white rounded">
    Salir
</button>

    </form>
</div>
        </aside>

        <!-- Contenido principal -->
<main class="flex-1 p-8"
      style="background-image: url('{{ asset('images/fondo-optica.jpg') }}');
             background-size: cover;
             background-position: center;
             background-repeat: no-repeat;">

        
         <p class="mt-0 text-black text-3xl text-right">
    Bienvenido al Sistema de Óptica García.
</p>
</p>

            <!-- Cuadro principal -->
            <div class="mt-0 p-0 rounded-lg shadow-sm text-center"
     style="background-color: transparent; border: 0px solid #060606;">

                <h3 class="text-xl font-semibold text-black">
                    Registro de pacientes
                </h3>

                <p class="mt-2 text-black">
                    Desde este sistema puedes registrar y administrar
                    la información de los pacientes.
                </p>

             <!-- Botones -->
             <a href="{{ route('pacientes.index') }}"
   class="inline-block mt-5 px-5 py-3 text-white rounded border border-black"
   style="background-color: #380462;">
    Ver pacientes
</a>

             <a href="{{ route('pacientes.create') }}"
   class="inline-block mt-5 ml-2 px-5 py-3 text-white rounded border border-black"
   style="background-color: #380462;">
    Registrar paciente
</a>

            </div>

        </main>

    </div>
</x-app-layout>
