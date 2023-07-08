<?php

namespace App\Http\Controllers;


use App\Models\student;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;


class StudentController extends Controller
{
        // GET
        public function allStudents() {

            $dataStudent = student::latest()->get();
            //dd($dataStudent);exit;
            return view('admin.student.student_all',compact('dataStudent'));
    
        }
    
        // GET
        public function addStudent() {
            return view('admin.student.student_add');
        }
    
    
        // POST
        public function storeStudent(Request $request){
            
            //dd($request);exit;

            $request->validate(
                ['dni' => 'required',],
                ['dni.required'   => 'El DNI es requerido',]
            
            );

            $request->validate(
                ['nombres' => 'required',],
                ['nombres.required'   => 'El nombre es requerido',]
            
            );

            $request->validate(
                ['apellidos' => 'required',],
                ['apellidos.required'   => 'El apellido es requerido',]
            
            );
    
            $imgUrl = '';
            if($request->file('image')){

                /*$img = $request->file('image');
                $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                $imgUrl = 'upload/student/'.$imgName;

                Image::make($img)->resize(430,327)->save($imgUrl);*/
            }
            
            student::insert([
                'dni' => $request->dni,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'genero' => $request->genero,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'tipo_alumno' => $request->categoria,
                'estado' => 0,
                'imagen'  => $imgUrl,
                'created_at' => Carbon::now(),
            ]);
    
            // Notificación de alerta para la vista
            $notifications = [
                'message'    => 'El alumno ha sido insertado correctamente',
                'alert-type' => 'success'
            ];
            
            return redirect()->route('all.students')->with($notifications);
        }
    
        // GET
        public function editStudent($id){
    
            $student = student::findOrFail($id);
            return view('admin.student.student_edit',compact('student'));
    
        }
    
    
        // POST
        public function updateStudent (Request $request,$id){
            
            //dd($id);
            $request->validate(
                ['dni' => 'required',],
                ['dni.required'   => 'El DNI es requerido',]
            
            );

            $request->validate(
                ['nombres' => 'required',],
                ['nombres.required'   => 'El nombre es requerido',]
            
            );

            $request->validate(
                ['apellidos' => 'required',],
                ['apellidos.required'   => 'El apellido es requerido',]
            
            );

            $idStudent = $request->id;
            $imgUrl = '';
            if($request->file('image')){

                $img = $request->file('image');
                $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                $imgUrl = 'upload/student/'.$imgName;

                Image::make($img)->resize(430,327)->save($imgUrl);

                student::findOrFail($idStudent)->update([
                    'dni' => $request->dni,
                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'genero' => $request->genero,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'tipo_alumno' => $request->categoria,
                    'imagen'  => $imgUrl,
                    'updated_at' => Carbon::now(),
                ]);

            } else {
                student::findOrFail($idStudent)->update([
                    'dni' => $request->dni,
                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'genero' => $request->genero,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'tipo_alumno' => $request->categoria,
                    'updated_at' => Carbon::now(),
                ]);

            }
    
            // Notificación de alerta para la vista
            $notifications = [
                'message'    => 'El estudiante ha sido actualizada correctamente',
                'alert-type' => 'success'
            ];
            
            return redirect()->route('all.students')->with($notifications);
        }
    
    
    
        public function deleteStudent(Request $request, $id){
    
            student::findOrFail($id)->delete();
    
            // Notificación de alerta para la vista
            $notifications = [
                'message'    => 'El estudiante ha sido eliminado correctamente',
                'alert-type' => 'success'
            ];
            
            return redirect()->back()->with($notifications);
    
        }
}
