@extends('admin.admin_template')

@section('admin')

 <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Todos los Estudiantes</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Lista de Estudiantes</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>DNI</th>  
                                <th>Nombres</th>  
                                <th>Apellidos</th>  
                                <th>Genero</th>  
                                <th>Teléfono</th>  
                                <th>Dirección</th>  
                                <th>Tipo Alumno</th>  
                                <th>Imagen</th>  
                                <th>Fecha Creación</th>
                                <th>Fecha Actualización</th>
                                <th>Acciones</th>
                            </thead>


                            <tbody>
                                
                            @foreach($dataStudent as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->dni }} </td> 
                                        <td> {{ $item->nombres }} </td> 
                                        <td> {{ $item->apellidos }} </td> 
                                        <td> {{ $item->genero }} </td> 
                                        <td> {{ $item->telefono }} </td> 
                                        <td> {{ $item->direccion }} </td> 
                                        <td> {{ $item->tipo_alumno }} </td> 
                                        <td> {{ $item->imagen == '' ? '' : ''}} </td>
                                        <td> {{ $item->created_at }} </td>
                                        <td> {{ $item->updated_at }} </td>
                                        <td>
                                            <a href="{{ route('edit.student', $item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

                                            <a href="{{ route('delete.student', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                                        </td>
                                    </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->    
    </div> <!-- container-fluid -->
</div>
 
@endsection