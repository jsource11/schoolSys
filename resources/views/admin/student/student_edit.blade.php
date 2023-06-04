@extends('admin.admin_template')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editar Estudiante</h4> <br><br>

                        

                        <form method="post" id="myForm" action="#" enctype="multipart/form-data">
                            @csrf
                            
                           
                            <div class="row mb-3">
                                <label for="producto" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="form-group col-sm-10">
                                    <input name="producto" value="{{ $product->nombre }}"  class="form-control" type="text" id="producto">
                                    
                                    @error('producto')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="form-group col-sm-10">
                                    <input name="descripcion" value="{{ $product->descripcion }}"  class="form-control" type="text" id="descripcion">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="precio_uni" class="col-sm-2 col-form-label">Precio Unitario (S/.)</label>
                                <div class="form-group col-sm-2">
                                    <input name="precio_uni" value="{{ $product->precio_uni }}" class="form-control" type="text" id="precio_uni">
                                    
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="stock_ini" class="col-sm-2 col-form-label">Stock Inicial</label>
                                <div class="form-group col-sm-2">
                                    <input name="stock_ini" value="{{ $product->stock_ini }}" class="form-control" type="number" id="stock_ini">
                                    
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="stock_act" class="col-sm-2 col-form-label">Stock Actual</label>
                                <div class="form-group col-sm-2">
                                    <input name="stock_act" value="{{ $product->stock_act }}" class="form-control" type="number" id="stock_act">
                                    
                                </div>
                            </div>
                            <!-- end row -->

                           


                            <div class="row mb-3">
                                <label for="unidad_med" class="col-sm-2 col-form-label">Unidad med.</label>
                                <div class="col-sm-10">
                                    <select name="unidad_med" class="form-select" aria-label="unidad_med">
                                        <option value="0" selected="">-- Seleccionar -- </option>
                                        <option value="Gramos" {{ "Gramos" == $product->unidad_med ? 'selected':''}}>Gramos</option>
                                        <option value="Litros" {{ "Litros" == $product->unidad_med ? 'selected':''}}>Litros</option>
                                        <option value="Paquetes" {{ "Paquetes" == $product->unidad_med ? 'selected':''}}>Paquetes</option>
                                        <option value="Unidades" {{ "Unidades" == $product->unidad_med ? 'selected':''}}>Unidades</option>
                                        <option value="Tarros" {{ "Tarros" == $product->unidad_med ? 'selected':''}}>Tarros</option>
                                        <option value="Botellas" {{ "Botellas" == $product->unidad_med ? 'selected':''}}>Botellas</option>
                                    </select>
                                </div>
                            </div>

                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="categoria" class="col-sm-2 col-form-label">Categoría</label>
                                <div class="col-sm-10">
                                    <select name="categoria" class="form-select" aria-label="categoria">
                                        <option value="0" selected="">-- Seleccionar -- </option>
                                        @foreach ($dataCategories as $item )
                                            <option value="{{ $item->id }}" {{$item->id == $product->id_categoria ? 'selected':''}}>{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            


                            <div class="row mb-3">
                                <label for="proveedor" class="col-sm-2 col-form-label">Proveedor</label>
                                <div class="col-sm-10">
                                    <select name="proveedor" class="form-select" aria-label="proveedor">
                                        <option value="0" selected="">-- Seleccionar -- </option>
                                        @foreach ($dataProvider as $item )
                                            <option value="{{ $item->id }}" {{$item->id == $product->id_proveedor ? 'selected':''}}>{{ $item->nom_prov }}</option>
                                        @endforeach
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
                                    <img id="showImage" class="rounded avatar-lg" src="{{ asset($product->imagen) }}" alt="Card image cap">
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