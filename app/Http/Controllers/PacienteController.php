<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PacienteController extends Controller
{
    public function exportarPDF()
    {
        $pacientes = Paciente::all();

        $pdf = Pdf::loadView('pacientes.pdf', compact('pacientes'));

        return $pdf->download('reporte_pacientes.pdf');
    }

   public function index(Request $request)
{
    $buscar = $request->buscar;

    $pacientes = Paciente::where('nombre_completo', 'LIKE', "%$buscar%")
        ->orderBy('id', 'desc')
        ->get();

    return view('pacientes.index', compact('pacientes', 'buscar'));
}

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'fecha_ingreso' => ['required', 'date'],
            'nombre_completo' => ['required', 'string', 'max:150'],
            'edad' => ['required', 'integer', 'min:0', 'max:120'],
            'direccion' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:25'],
            'observaciones' => ['nullable', 'string'],
        ]);

        Paciente::create($datos);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente registrado correctamente.');
    }

    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $datos = $request->validate([
            'fecha_ingreso' => ['required', 'date'],
            'nombre_completo' => ['required', 'string', 'max:150'],
            'edad' => ['required', 'integer', 'min:0', 'max:120'],
            'direccion' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:25'],
            'observaciones' => ['nullable', 'string'],
        ]);

        $paciente->update($datos);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente eliminado correctamente.');
    }
}
