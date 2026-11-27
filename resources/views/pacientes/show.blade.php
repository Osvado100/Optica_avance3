
<x-app-layout>
    <div style="display: flex; min-height: 100vh; background: #f3f4f6;">

        <aside style="width: 240px; background: #380462; color: white; padding: 25px; display: flex; flex-direction: column;">
            <h2 style="font-size: 22px; font-weight: bold;">Óptica García</h2>
            <p style="margin-top: 5px; color: #cbd5e1;">Sistema de pacientes</p>

            <nav style="margin-top: 35px; flex: 1;">
                <a href="{{ route('dashboard') }}" style="display: block; color: white; padding: 12px; text-decoration: none;">Inicio</a>
                <a href="{{ route('pacientes.create') }}" style="display: block; color: white; padding: 12px; text-decoration: none;">Nuevo paciente</a>
            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="color: white; background: transparent; border: none; cursor: pointer;">Salir</button>
            </form>
        </aside>

        <main style="flex: 1; padding: 35px;">
            <h1 style="font-size: 28px; font-weight: bold; color: #380462;">Información del paciente</h1>

            <div style="max-width: 750px; background: white; padding: 25px; margin-top: 25px; border-radius: 8px;">
                <p style="margin-bottom: 15px;"><strong>Fecha de ingreso:</strong> {{ $paciente->fecha_ingreso }}</p>
                <p style="margin-bottom: 15px;"><strong>Nombre completo:</strong> {{ $paciente->nombre_completo }}</p>
                <p style="margin-bottom: 15px;"><strong>Edad:</strong> {{ $paciente->edad }}</p>
                <p style="margin-bottom: 15px;"><strong>Dirección:</strong> {{ $paciente->direccion }}</p>
                <p style="margin-bottom: 15px;"><strong>Celular:</strong> {{ $paciente->celular }}</p>
                <p style="margin-bottom: 15px;"><strong>Observaciones:</strong> {{ $paciente->observaciones ?? 'Sin observaciones' }}</p>

                <a href="{{ route('pacientes.index') }}" style="display: inline-block; margin-top: 15px; padding: 12px 20px; background: #380462; color: white; text-decoration: none; border-radius: 5px;">
                    Volver al listado
                </a>

                <a href="{{ route('pacientes.edit', $paciente) }}" style="display: inline-block; margin-top: 15px; margin-left: 8px; padding: 12px 20px; background: #380462; color: white; text-decoration: none; border-radius: 5px;">
                    Editar paciente
                </a>
            </div>
        </main>
    </div>
</x-app-layout>

