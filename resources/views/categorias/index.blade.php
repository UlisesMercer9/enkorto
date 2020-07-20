@extends('home')

@section('content')

@include('alerts.success')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">

<div class="container">


  <div class="card">
     <h5 class="card-header info-color white-text text-center py-4">
         <strong>Categoria</strong>
     </h5>
     <!--Card content-->
     <div class="card-body px-lg-5">
       <table class="table table-borderless">
         <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">Categoria</th>
             <th scope="col">Opciones</th>
           </tr>
         </thead>
         <tbody>
           @foreach($categorias as $categoria)
            <tr>
                <th>{{ $categoria->id}}</th>
                <th>{{ $categoria->categoria}}</th>
                <th>
                  <a href="{{ route ('categorias.edit', $categoria->id)}}" class="btn btn-info">
                    <i class="fa fa-edit text-white"></i>
                     Editar
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#centralModalDanger{{ $categoria->id}}">
                    <i class="fa fa-trash text-white"></i>
                    Eliminar
                  </button>
                </th>
            </tr>

            @include('alerts.modals')
           @endforeach

         </tbody>
       </table>
     </div>

  </div>
  <!-- Material form subscription -->

  {!! $categorias->links() !!}

  <br><br>

  <div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
  <a href="{!!URL::to('/categorias/create')!!}" class="btn-floating  btn-lg red">
    <i class="fa fa-plus"></i>
  </a>

  </div>

</section>


@endsection
