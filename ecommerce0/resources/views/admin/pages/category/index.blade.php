@extends('admin.pages.master')

@section('styles')

@endsection

@section('content')



<div style="width: 100%" class="card">
     <div class="col-md-12 col-xl-12">
          @if ($errors->any())
          <div class="alert alert-danger">
               <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
               </ul>
          </div>
          @endif

          @if (!$errors == 123 )
          <div class="alert alert-success">
               <ul>
                    <li>New Category Added!</li>
               </ul>
          </div>
          @endif
          <div class="card-header">
               <h3 class="card-title">Categories Table</h3>

               <button class="float-right" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fas fa-plus-circle"></i>
               </button>
               <a href=""></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
               <table style="text-align: center;" id="myTable" class="table table-bordered table-striped">
                    <thead>
                         <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Manage</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $x = 1?>
                         @foreach ($categories as $item)
                         <tr>
                              <td>{{ $x++ }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->description }}</td>
                              <td>
                                   <a onclick="edit({{ $item->id }})" data-toggle="modal" data-target="#exampleModal"
                                        id="editCategory" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                   </a>
                                   <a onclick="deleteCat({{ $item->id }})" id="deleteCategroy"
                                        class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                        data-target="#deleteModal">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                   </a>
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
               </table>
          </div>
     </div>

     <!-- /.card-body -->


     <!-- add,edit Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">

                         <form action="{{ route('admin.category.make') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                   <label for="name">Name</label>
                                   <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="emailHelp" placeholder="Enter name">
                              </div>
                              <div class="form-group">
                                   <label for="des">Description</label>
                                   <textarea class="form-control" name="description" id="des" name="description"
                                        placeholder="Description..."></textarea>
                              </div>
                              <input type="hidden" name="mId" id="mID" value="0">

                    </div>
                    <div class="modal-footer">
                         <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>

     {{-- end modal  --}}

     {{-- delete modal --}}
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this category?</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="{{ route('admin.category.destroy') }}" method="POST">
                         @csrf

                         <input type="hidden" name="dID" id="dID" value="0">                         
                         <div class="modal-footer">
                              <button type="submit" id="submit" class="btn btn-primary">YES</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    </form>
               </div>
          </div>
     </div>
</div>
{{-- end delete modal --}}


@endsection

@section('scripts')

<script>
     $(document).ready(function() {
          $('#dashboardCard').html('');
     });
     
</script>

<script>
     $('#myTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
</script>

<script>
     function edit(id) {
               event.preventDefault();
               //console.log(id);               
               $.ajax({
                    url: 'update',
                    type: 'GET',
                    dataType: 'JSON',
                    data: {id: id},
                    success: function(result){
                         //console.log(result);
                         $('#name').val(result.name);
                         $('#des').val(result.description);                         
                         $('#mID').val(result.id);
                    }
               });
          }

          
          function deleteCat(id) {
               event.preventDefault();
               $('#dID').val(id);
               console.log($('#dID').val());
               
          }                    
</script>

@endsection