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
          <li class="breadcrumb-item"><a href="{!!URL::to('/services')!!}">Inicio</a></li>
          <li class="breadcrumb-item active">Crear servicio</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>




<div class="container">
  <!-- Material form subscription -->
<div class="card">

   <h5 class="card-header info-color white-text text-center py-4">
       <strong>Servicios</strong>
   </h5>

   <!--Card content-->
   <div class="card-body px-lg-5">
       <!-- Form -->
       <form class="text-center" action="{{ url('/services') }}" method="post" enctype="multipart/form-data">
           <br>
           {{ csrf_field() }}
           <!-- Name -->
           <div class="row">
             <!-- Grid column -->
             <div class="col-md-12">
               <!-- Material input -->
               <div class="md-form form-group">
                 <input type="text" name="nombre" class="form-control" id="nombre" placeholder="">
                 <label for="nombre">Nombre: </label>
               </div>
             </div>
             <div class="col-md-12">
               <div class="md-form md-outline">
                  <textarea id="descripcion" name="descripcion" class="md-textarea form-control" rows="4"></textarea>
                  <label for="descripcion">Descripcion: </label>
               </div>
             </div>

               <!-- Grid column -->
               <div class="col-md-4">
                 <!-- Material input -->
                 <div class="md-form form-group">
                   <input type="text" class="form-control" name="dias_atencion" id="dias" placeholder="ejemplo: Lu/Vi">
                   <label for="dias">Días de atención: </label>
                 </div>
               </div>
               <!-- Grid column -->

               <!-- Grid column -->
               <div class="col-md-4">
                 <!-- Material input -->
                 <div class="md-form form-group">
                   <input type="text" class="form-control" name="horario" id="horario" placeholder="ejemplo: 8:00 a 23:00">
                   <label for="horario">Horario de atención: </label>
                 </div>
               </div>
               <!-- Grid column -->

               <!-- Grid column -->
               <div class="col-md-4">
                 <!-- Material input -->
                 <div class="md-form form-group">
                   <input type="text" class="form-control" name="forma_entrega" id="entrega" placeholder="ejemplo: a domincilio">
                   <label for="entrega">Forma de entrega:</label>
                 </div>
               </div>
               <!-- Grid column -->

               <!-- Grid column -->
                <div class="col-md-4">
                  <!-- Material input -->
                  <div class="md-form form-group">
                    <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="ejemplo: 232127XXXX">
                    <label for="whatsapp">Whatsapp: </label>
                  </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-8">
                  <!-- Material input -->
                  <div class="md-form form-group">
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="ejemplo: https://www.facebook.com/establecimientoejemplo ">
                    <label for="facebook">link de Facebook: </label>
                  </div>
                </div>

                <div class="col-md-6 md-form">
                  <div class="file-field">
                     <a class="btn-floating blue-gradient mt-0 float-left">
                       <i class="fas fa-paperclip" aria-hidden="true"></i>
                       <input type="file" name="foto">
                     </a>
                     <div class="file-path-wrapper">
                       <input name="foto" class="file-path validate" type="text" name="foto" placeholder="foto del establecimiento">
                     </div>
                   </div>
                </div>

                <div class="col-md-6">
                  <select name="categories_id" class="mdb-select md-form">
                    <option value="" disabled selected>Elige una categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id}}">{{ $categoria->categoria}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- Grid column -->

           <!-- Sign in button -->
           <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Resgistrar</button>
       </form>
       <!-- Form -->
   </div>

</div>
<!-- Material form subscription -->

</div>

<br>
<br>
<br>
<br>

</div>


@endsection
