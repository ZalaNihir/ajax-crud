

    <div class="container">
      <div class="row">
        <div class="col-10">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                 <td>
                 <a class="btn btn-success" data-url="{{route('edit',$item->id)}}" data-id="{{$item->id}}">Edit</a> 
                   <a class="btn btn-danger" data-url="{{route('delete',$item->id)}}"data-id="{{$item->id}}">Delete</a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-2 p-4">
          <form action="">
            @csrf
            <input type="hidden" name="id" id="editId">
            <div class="form-group">                                                                                                          
              <label for="name" class="form-label">Name:</label>
              <input type="text" name="name" class="form-control" id="editName">
            </div>
            <div class="form-group float-end">
              <button class="btn btn-secondary" id="update">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <script>
      $('.btn-danger').on('click',function(){
        let url = $(this).data('url');
        let id =$(this).data('id');
        $.ajax({
          method:"GET",
          url:url,
          data:{
            'id':id,
          },
          success:function(data){
           if(data.code == 200){
            ajaxCall();
           }
          }
        });
      });
      $('.btn-success').on('click',function(){
        let url = $(this).data('url');
        let id =$(this).data('id');
        $.ajax({
          method:"GET",
          url:url,
          data:{
            'id':id,
          },
          success:function(data){
            // alert(data.data.name);
           $('#editId').val(data.data.id);
           $('#editName').val(data.data.name);
          }
        });
      });
      $('#update').on('click',function(e){
            e.preventDefault();
            let id = $('#editId').val();
            let name = $('#editName').val();
            $.ajax({
              method:"POST",
              url:"{{route('store')}}",
              data:{
                "_token":"{{csrf_token()}}",
                "name":name,
                "id":id,
              },
              success:function(response)
              {
                if(response.code ==200){
                  $('#name').val("");
                  $(".btn-close").click();
                  ajaxCall();
                }  
              }
            });

        });
    </script>