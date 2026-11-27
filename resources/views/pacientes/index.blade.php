
<x-app-layout>
    <div style="display: flex; min-height: 100vh; background: #f3f4f6;">

        <aside style="width: 240px; background: #380462; color: white; padding: 25px; display: flex; flex-direction: column;">
        <h2 style="font-size: 22px; font-weight: bold; text-align: center;"> Óptica García
        </h2> <p style="margin-top: 5px; color: #cbd5e1; text-align: center;">Sistema de Pacientes</p>

         <nav style="margin-top: 35px; flex: 1; text-align: center;">

    <a href="{{ route('dashboard') }}"
       style="display: block; color: white; padding: 12px; text-decoration: none; text-align: center;">
        Inicio
    </a>

</nav>

           <div style="position: relative; top: -40px; text-align: center;">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="color: white; background: transparent; border: none; cursor: pointer;">
            Salir
        </button>
    </form>
</div>
    @csrf
    
</form>
        </aside>

        <main style="flex: 1; padding: 35px; overflow-x: auto;">
            <h1 style="font-size: 28px; font-weight: bold; color: #3c034f;">Listado de pacientes</h1>
            <!-- Buscar pacientes -->
<form action="{{ route('pacientes.index') }}" method="GET" style="margin-top: 20px;">

    <input type="text"
           name="buscar"
           placeholder="Escribe el nombre del paciente..."
           value="{{ $buscar ?? '' }}"
           style="padding: 10px; width: 300px; border: 1px solid #380462; border-radius: 5px;">

    <button type="submit"
            style="padding: 10px 18px; background: #380462; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Buscar
    </button>

    <a href="{{ route('pacientes.index') }}"
       style="padding: 10px 18px; background: #380462; color: white; text-decoration: none; border-radius: 5px;">
        Mostrar todos
    </a>

</form>
            
            <a href="{{ route('pacientes.pdf') }}"
            style="display: inline-block; margin-top: 15px; padding: 12px 18px; background: #0f011a; color: white; text-decoration: none; border-radius: 5px;">
            Exportar PDF
        </a>

            @if (session('success'))
                <p style="color: #187044; margin: 15px 0;">{{ session('success') }}</p>
            @endif

            <a href="{{ route('pacientes.create') }}" style="display: inline-block; margin-top: 20px; padding: 12px 18px; background: #380462; color: white; text-decoration: none; border-radius: 5px;">
                Registrar paciente
            </a>

            <table style="width: 100%; margin-top: 20px; border-collapse: collapse; background: white;">
                <thead>
                    <tr style="background: #380462; color: white;">
                        <th style="padding: 10px;">Fecha de ingreso</th>
                        <th style="padding: 10px;">Nombre completo</th>
                        <th style="padding: 10px;">Edad</th>
                        <th style="padding: 10px;">Dirección</th>
                        <th style="padding: 10px;">Celular</th>
                        <th style="padding: 10px;">Observaciones</th>
                        <th style="padding: 10px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pacientes as $paciente)
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $paciente->fecha_ingreso }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $paciente->nombre_completo }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $paciente->edad }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $paciente->direccion }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $paciente->celular }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $paciente->observaciones ?? 'Sin observaciones' }}</td>
                            <td style="padding: 10px; border-bottom: 1px solid #ddd; white-space: nowrap;">
                                <a href="{{ route('pacientes.show', $paciente) }}" style="color: #380462;">Ver</a>

                                <a href="{{ route('pacientes.edit', $paciente) }}" style="color: #380462; margin-left: 8px;">Editar</a>

                                <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Deseas eliminar este paciente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #b91a15; color: white; padding: 7px 10px; border: none; border-radius: 4px; cursor: pointer; margin-left: 8px;">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding: 15px;">
    @if(request('buscar'))
        No se encontraron pacientes con ese nombre.
    @else
        Todavía no hay pacientes registrados.
    @endif
</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
    </div>
</x-app-layout>
