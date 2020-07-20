@extends('home')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{!!URL::to('/categorias')!!}">Inicio</a></li>
          <li class="breadcrumb-item active">Crear categoria</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>




<div class="container">
  <!-- Material form subscription -->
<div class="card">

   <h5 class="card-header info-color white-text text-center py-4">
       <strong>Categoria</strong>
   </h5>

   <!--Card content-->
   <div class="card-body px-lg-5">
       <!-- Form -->
      {!!Form::open(['route'=>'categorias.store','method'=>'POST','class'=>'text-center','files'=>true])!!}
           <br>
           {{ csrf_field() }}
           <!-- Name -->
           <div class="md-form mt-3">
               {!!Form::text('categoria',null,['class'=>'form-control','id'=>'materialSubscriptionFormPasswords'])!!}
               <label for="materialSubscriptionFormPasswords">Nuvea categoria</label>
           </div>
           <!-- Sign in button -->
           <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Resgistrar</button>

       {!!Form::close()!!}
       <!-- Form -->
   </div>

</div>
<!-- Material form subscription -->
</div>



@endsection
