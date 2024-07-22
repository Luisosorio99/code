<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3">SISTEMA DE PACIENTES</h1>

    @if (session("correcto"))
        <div class="alert alert-success">{{session("correcto")}}</div>
    @endif

    @if (session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif

    <script>
      var res=function(){
        var not=confirm("¿Estás seguro de eliminar?");
        return not;
      }
    </script>
<!-- Modal de registro de datos -->
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Pacientes</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{route("crud.create")}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Codigo del paciente</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del paciente</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido del paciente</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtapellido">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtfecha">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdireccion">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttelefono">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcorreo">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Historial medico</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txthistorial">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="p-5 table-responsive">
      <button class="btn btn-success  "  data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir Producto</button>
        <table class="table table-striped table-bordered table-hover ">
            <thead class="bg-primary text-white">
              <tr>
                <th scope="col">CODIGO</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">FECHA DE NACIMIENTO</th>
                <th scope="col">DIRECCIÓN</th>
                <th scope="col">TELÉFONO</th>
                <th scope="col">CORREO ELECTRÓNICO</th>
                <th scope="col">HISTORIAL MEDICO</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $item)
                <tr>
                    <th>{{$item->id_cliente}}</th>
                    <td>{{$item->nombre}}</td>
                    <td><b>Q</b>{{$item->apellido}}</td>
                    <td>{{$item->fecha_nacimiento}}</td>
                    <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id_producto}}" class="btn btn-warning btn-sm "><i 
                      class="fa-regular fa-pen-to-square"></i></a>
                    <a href="{{route("crud.delete",$item->id_producto )}}" onclick="return res();" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    </td>
                          <!-- Modal de modificar datos -->
                          <div class="modal fade" id="modalEditar{{$item->id_producto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Datos</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{route("crud.update")}}" method="post" >
                                    @csrf
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Código del Producto</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcodigo" value="{{$item->id_producto}}" readonly>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Nombre del Producto</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre" value="{{$item->nombre}}">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Precio del Producto</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtprecio" value="{{$item->precio}}">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Cantidad del Producto</label>
                                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcantidad" value="{{$item->cantidad}}">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-primary">Modificar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>