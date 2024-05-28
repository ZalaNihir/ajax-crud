@extends('welcome')
@section('content')

   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Add
  </button>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            @csrf
            <input type="text" name="name" id="name">
            <input type="button" id="submit" name="submit" class="btn btn-primary" value="Save" >
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="showdiv">

</div>

  <script>
    
    function ajaxCall()
    {
      $.ajax({
        url:"{{route('ajax')}}",
        method:"GET",
        data:{},
        success:function(response)
        {
          $(".showdiv").html("");
          $(".showdiv").html(response);
        }
      });
    }
    ajaxCall();
    $('#submit').on('click',function(e){
            e.preventDefault();
            let name =$('#name').val();
            $.ajax({
              url:"{{route('store')}}",
              method:"POST",
              data:{
                "_token":"{{csrf_token()}}",
                "name":name,
              },
              success:function(response)
              {
                if(response.code ==200){
                  $('#name').val("");
                  // $('#exampleModal').html('hide');
                  $(".btn-close").click();
                  ajaxCall();
                }  
              }
            });

        });
    
  </script>
@endsection