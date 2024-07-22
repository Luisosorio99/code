<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller{

    public function index(){
        $data = DB::select('select * from pacientes');
        return view('welcome')->with('data', $data);
    }

    public function create(Request $request){
        try{
            $sql=DB::insert("insert into pacientes(Id_cliente, Nombre, Apellido, fecha_nacimiento, Dirección, Teléfono, Correo, Historial_medico ) values (?,?,?,?,?,?,?,?)",[
                $request->txtcodigo,
                $request->txtnombre,
                $request->txtapellido,
                $request->txtfecha,
                $request->txtdireccion,
                $request->txttelefono,
                $request->txtcorreo,
                $request->txthistorial
            ]);
        }catch (\Throwable $th) {
            $sql = 0;
           
        }
        if($sql == true) {
            return back()->with("correcto","Producto registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }
    }
    
}
class PacienteController extends Controller
{
    public function create(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'txtcodigo' => 'required',
            'txtnombre' => 'required',
            'txtapellido' => 'required',
            'txtfecha' => 'required|date',
            'txtdireccion' => 'required',
            'txttelefono' => 'required',
            'txtcorreo' => 'required|email',
            'txthistorial' => 'required',
        ]);

    }
}