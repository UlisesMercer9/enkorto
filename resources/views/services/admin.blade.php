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
         <strong>Servicios</strong>
     </h5>
     <!--Card content-->
     <div class="card-body px-lg-5">
       <table class="table table-borderless">
         <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">Foto</th>
             <th scope="col">Nombre</th>
             <th scope="col">Opciones</th>
           </tr>
         </thead>
         <tbody>
           @foreach($services as $service)
            <tr>
                <th>{{ $service->id}}</th>
                <th><img src="{{ asset('storage').'/'.$service->foto }}" alt="" width="150"></img></th>
                <th>{{ $service->nombre}}</th>
                <th>
                  <a href="{{ route ('services.edit', $service->id)}}" class="btn btn-info">
                    <i class="fa fa-edit text-white"></i>
                     Editar
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#centralModalDanger{{ $service->id}}">
                    <i class="fa fa-trash text-white"></i>
                    Eliminar
                  </button>
                </th>
            </tr>

            @include('alerts.modalService')

           @endforeach

         </tbody>
       </table>
     </div>

  </div>
  <!-- Material form subscription -->

  {!! $services->links() !!}

  <br><br>
  </div>

  <div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
  <a href="{!!URL::to('/services/create')!!}" class="btn-floating  btn-lg red">
    <i class="fa fa-plus"></i>
  </a>
</div>


</section>


@endsection
