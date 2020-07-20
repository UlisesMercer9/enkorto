<!-- Central Modal Medium Danger -->
 <div class="modal fade" id="centralModalDanger{{ $service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-danger" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Eliminar</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>¿Estas seguro de eliminar la servicio?</p>
         </div>
       </div>

       <!--Footer-->

       <div class="modal-footer justify-content-center">
         <form class="" action="{{ url('/services/'.$service->id) }}" method="post">
           {{ csrf_field() }}
           {{ method_field('DELETE') }}
          <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Cancelar</a>
          <button type="submit" class="btn btn-danger"> Aceptar <i class="fa fa-trash text-white"></i> </button>
         </form>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Danger-->
