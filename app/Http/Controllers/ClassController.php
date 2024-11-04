<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;

class ClassController extends Controller
{
    //function for load view 
    public function create(){
        

        $teachers = User::whereHas('role',function($query){
            $query->where('name','teacher');
        })->get();
        

        return view('classes.create', compact('teachers'));
    }



    public function store(Request $request){

        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'teacher_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'headquarters' => 'required|string|max:255',
            'classroom' => 'required|string|max:255',
            //'students' => 'array', // Validación de array para los estudiantes
            //'students.*' => 'exists:users,id' // Asegura que cada ID existe en la tabla de usuarios
        ]);

        // Crear una nueva clase con los datos validados
        $class = new ClassModel();
        $class->name = $validatedData['name'];
        $class->level = $validatedData['level'];
        $class->teacher_id = $validatedData['teacher_id'];
        $class->date = $validatedData['date'];
        $class->start_time = $validatedData['start_time'];
        $class->end_time = $validatedData['end_time'];
        $class->headquarters = $validatedData['headquarters'];
        $class->classroom = $validatedData['classroom'];
        $class->save();

        // Asignar estudiantes si se incluyen en la solicitud
        /*if (!empty($validatedData['students'])) {
            $class->students()->attach($validatedData['students']);
        }*/


    return redirect()->route('classes.index')->with('success', 'Clase creada exitosamente');
    }



    public function index(){
        $classes = ClassModel::all();
        return view('classes.index', compact('classes'));
    }
}
