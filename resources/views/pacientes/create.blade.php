
<x-app-layout>
    <div style="display: flex; min-height: 100vh; background: #ffffff;">

        <aside style="width: 240px; background: #380462; color: white; padding: 25px; display: flex; flex-direction: column;">
            <h2 style="font-size: 22px; font-weight: bold;">Óptica García</h2>
            <p style="margin-top: 5px; color: #cbd5e1;">Sistema de pacientes toto</p>

            <nav style="margin-top: 35px; flex: 1;">
                <a href="{{ route('dashboard') }}" style="display: block; color: white; padding: 12px; text-decoration: none;">Inicio</a>
                <a href="{{ route('pacientes.create') }}" style="display: block; color: white; background: #380462; padding: 12px; text-decoration: none;">Nuevo paciente</a>
            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="color: white; background: transparent; border: none; cursor: pointer;">Salir</button>
            </form>
        </aside>

        <main style="flex: 1; padding: 35px;">
            <h1 style="font-size: 28px; font-weight: bold; color: #380462;">Registro de nuevo paciente</h1>
            <p style="margin-top: 8px; color: #380462;">Completa la información del paciente.</p>

            <div style="max-width: 850px; background: white; padding: 25px; margin-top: 25px; border-radius: 8px;">

                @if ($errors->any())
                    <div style="background: #fee2e2; color: #991b1b; padding: 15px; margin-bottom: 20px;">
                        <p>Corrige los siguientes errores:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pacientes.store') }}" method="POST">
                    @csrf

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px;">

                        <div>
                            <label for="fecha_ingreso">Fecha de ingreso</label>
                            <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', date('Y-m-d')) }}" required style="display: block; width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #ccc;">
                        </div>

                        <div>
                            <label for="nombre_completo">Nombre completo</label>
                            <input type="text" id="nombre_completo" name="nombre_completo" maxlength="150" value="{{ old('nombre_completo') }}" required style="display: block; width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #ccc;">
                        </div>

                        <div>
                            <label for="edad">Edad</label>
                            <input type="number" id="edad" name="edad" min="0" max="120" value="{{ old('edad') }}" required style="display: block; width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #ccc;">
                        </div>

                        <div>
                            <label for="celular">Celular</label>
                            <input type="tel" id="celular" name="celular" maxlength="25" value="{{ old('celular') }}" required style="display: block; width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #ccc;">
                        </div>

                        <div style="grid-column: 1 / -1;">
                            <label for="direccion">Dirección</label>
                            <input type="text" id="direccion" name="direccion" maxlength="255" value="{{ old('direccion') }}" required style="display: block; width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #ccc;">
                        </div>

                        <div style="grid-column: 1 / -1;">
                            <label for="observaciones">Observaciones</label>
                            <textarea id="observaciones" name="observaciones" rows="4" style="display: block; width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #ccc;">{{ old('observaciones') }}</textarea>
                        </div>

                    </div>

                    <div style="margin-top: 25px; padding: 20px; border: 2px solid #380462;">
                        <button type="submit" style="background: #380462; color: white; padding: 12px 25px; border: none; border-radius: 5px; cursor: pointer;">
                            GUARDAR PACIENTE
                        </button>

                        <a href="{{ route('pacientes.index') }}" style="display: inline-block; background: #380462; color: white; padding: 12px 25px; margin-left: 200px; border-radius: 5px; text-decoration: none;">
                            VOLVER AL LISTADO
                        </a>
                    </div>

                </form>
            </div>
        </main>
    </div>
</x-app-layout>
