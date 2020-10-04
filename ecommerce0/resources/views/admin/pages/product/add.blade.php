@extends('admin.pages.master2')

@section('content')

<div style="width:100%;" class="card card-default">
     <div class="card-header">
          <h3 class="card-title">Select2 (Default Theme)</h3>

          <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                         class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                         class="fas fa-times"></i></button>
          </div>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
          <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                         <label>Name</label>
                         <input class="form-control" type="text" name="name" id="pid">
                    </div>

               </div>
               <!-- /.col -->
               <div class="col-md-6">
                    <div class="form-group">
                         <label>Select Category</label>
                         <select class="form-control">
                              @foreach ($categories as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                         </select>
                    </div>
               </div>
               <!-- /.col -->
               <div class="col-md-6">
                    <div class="form-group">
                         <label>Select Image</label>
                         <select class="form-control">
                              @foreach ($categories as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                         </select>
                    </div>
               </div>
               <!-- /.col -->
               <div class="col-md-6">
                    <div class="form-group">
                         <label>Select File</label>
                         <select class="form-control">
                              @foreach ($categories as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                         </select>
                    </div>
               </div>
          </div>
          <!-- /.row -->
     </div>
     <!-- /.card-body -->
     <div class="card-footer">
     </div>
</div>

@endsection