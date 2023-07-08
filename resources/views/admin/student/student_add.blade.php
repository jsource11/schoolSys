@extends('admin.admin_template')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Agregar Estudiante</h4> <br><br>

                        

                        <form method="post" id="myForm" action="{{ route('store.student') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="dni" class="col-sm-2 col-form-label">DNI</label>
                                <div class="form-group col-sm-5">
                                    <input name="dni" value="{{ old('dni') }}"  class="form-control" type="number" id="dni">
                                    @error('dni')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                           
                            <div class="row mb-3">
                                <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                                <div class="form-group col-sm-10">
                                    <input name="nombres" value="{{ old('nombres') }}"  class="form-control" type="text" id="nombres">
                                    @error('nombres')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                                <div class="form-group col-sm-10">
                                    <input name="apellidos" value="{{ old('apellidos') }}"  class="form-control" type="text" id="apellidos">
                                    @error('apellidos')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="genero" class="col-sm-2 col-form-label">Genero</label>
                                <div class="col-sm-10">
                                    <select name="genero" class="form-select" aria-label="genero">
                                        <option selected="">-- Seleccionar -- </option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                           

                            <div class="row mb-3">
                                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="form-group col-sm-5">
                                    <input name="telefono" value="{{ old('telefono') }}" class="form-control" type="number" id="telefono">
                                    
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                                <div class="form-group col-sm-10">
                                    <input name="direccion" value="{{ old('direccion') }}" class="form-control" type="text" id="direccion">
                                    
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="categoria" class="col-sm-2 col-form-label">Tipo de Estudiante</label>
                                <div class="col-sm-10">
                                    <select name="categoria" class="form-select" aria-label="categoria">
                                        <option selected="">-- Seleccionar -- </option>
                                            <option value="Externo">Externo</option>
                                            <option value="Interno">Interno</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Imagen</label>
                                <div class="col-sm-10">
                                    <input name="image" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Guardar">
                        </form>
        
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection 