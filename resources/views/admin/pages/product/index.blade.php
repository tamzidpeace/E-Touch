@extends('admin.pages.master2')

@section('content')

<div class="row">
     <div style="width: 100%" class="card">
          <div class="col-md-12 col-xl-12">
               <div class="card-header">
                    <h3 class="card-title">Product Table</h3>

                    <a class="btn btn-primary float-right" href="{{ route('admin.product.make') }}">
                         <i class="fas fa-plus-circle"></i>
                    </a>

               </div>
               <!-- /.card-header -->
               <div class="card-body">
                    <table style="text-align: center;" id="myTable" class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <th>#</th>
                                   <th>Name</th>
                                   <th>Category</th>
                                   <th>Description</th>
                                   <th>Model Number</th>
                                   <th>Image</th>
                                   <th>Manage</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $x = 1; $y = 0;?>
                              @foreach ($products as $item)
                              <tr>
                                   <td>{{ $x++ }}</td>
                                   <td>{{ $item->name }}</td>
                                   <td>{{ $item->category->name }}</td>
                                   <td>{{ substr(strip_tags($item->description), 0, 30)   }}</td>
                                   <td>{{ $item->model_number }}</td>
                                   <td>

                                        <img style="width: 60px; height:45px;" src="{{ asset('public/images/product/'. $image_name[$y++]->name) }}"
                                             class="card-img-top" alt="...">

                                   </td>
                                   <td>
                                        {{-- <a onclick="view({{ $item->id }})" data-toggle="modal"
                                        data-target="#productViewModal" id="viewProduct"
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                        </a> --}}
                                        <a class="btn btn-info btn-sm"
                                             href="{{ route('admin.product.view', ['id' => $item->id]) }}"><i
                                                  class="fas fa-folder"></i>View</a>

                                        <a onclick="edit({{ $item->id }})" data-toggle="modal"
                                             data-target="#productEditModal" id="editProduct" 
                                             class="btn btn-info btn-sm">
                                             <i class="fas fa-pencil-alt">
                                             </i>
                                             Edit
                                        </a>
                                        <a onclick="deleteProduct({{ $item->id }})" id="deleteCategroy"
                                             class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                             data-target="#productDeleteModal">
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
     </div>
     {{-- models --}}

     {{-- view modal --}}

     {{-- <div class="modal fade" id="productViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="card card-solid">
                         <div class="card-body">
                              <div class="row">
                                   <div class="productModalContent" class="col-12 col-sm-6">

                                        {{-- <h3>Name</h3>
                                        <div class="col-12">
                                             <img src="../../dist/img/prod-1.jpg" class="product-image"
                                                  alt="Product Image">
                                        </div>
                                        <div class="col-12 product-image-thumbs">
                                             <div class="product-image-thumb active"><img
                                                       src="../../dist/img/prod-1.jpg" alt="Product Image"></div>

                                        </div> --}}
                                   </div>

                              </div>

                         </div>
                         <!-- /.card-body -->
                    </div>

               </div>
          </div>
     {{-- </div> --}}

     {{-- end view modal
     
{{-- edit modal --}}

     <div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="card card-solid">
                         <div class="card-body">
                              <div class="row">
                                   <form action="{{ route('admin.product.make-confirm' ) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="update" value="1">
                                        <input type="hidden" name="product_id" id="editProductId" value="1">
                                        <div class="card-body">
                                             <div class="row">
                              
                                                  <div class="col-md-6">
                                                       <div class="form-group">
                                                            <label>Name</label>
                                                            <input class="form-control" type="text" name="name" id="editProductName">
                                                       </div>
                              
                                                  </div>
                                                  <!-- /.col -->
                                                  <div class="col-md-6">
                                                       <div class="form-group">
                                                            <label>Select Category</label>
                                                            <select name="category" class="form-control">
                                                                 @foreach ($categories as $item)
                                                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                 @endforeach
                                                            </select>
                                                       </div>
                                                  </div>
                                                  <!-- /.col -->
                                                  <div class="col-md-6">
                                                       <div class="form-group">
                                                            <label for="files">Select Images</label>
                                                            <input class="form-control" type="file" id="pImages" name="p_images[]" multiple>
                                                       </div>
                                                  </div>
                                                  <!-- /.col -->
                                                  <div class="col-md-6">
                                                       <div class="form-group">
                                                            <label>Select File</label>
                                                            <input class="form-control" type="file" name="file" id="pFile">
                                                       </div>
                                                  </div>

                                                  <div class="col-md-6">
                                                       <div class="form-group">
                                                            <label>Product Model Number</label>
                                                            <input class="form-control" type="text" name="model_number" id="pModel">
                                                       </div>
                                                  </div>
                              
                                                  <div class="col-md-12">
                                                       <div style="" class="form-group">
                              
                                                            <div class="mb-3">
                                                                 <textarea name="description" id="editProductDesc2" class="textarea"
                                                                      placeholder="Place some text here" style=""></textarea>
                                                            </div>
                              
                              
                                                       </div>
                                                       <button type="submit" class="btn btn-primary float-right">Submit</button>
                                                  </div>
                              
                              
                              
                                             </div>
                                             <!-- /.row -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                        </div>
                              
                                   </form>

                              </div>

                         </div>
                         <!-- /.card-body -->
                    </div>

               </div>
          </div>
     </div>

{{-- end edit modal --}}

     {{-- delete modal --}}
     <div class="modal fade" id="productDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this Product?</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="{{ route('admin.product.destroy') }}" method="POST">
                         @csrf

                         <input type="hidden" name="pID" id="pID" value="0">
                         <div class="modal-footer">
                              <button type="submit" id="deleteSubmit" class="btn btn-primary">YES</button>
                              <button type="button" id="deleteNo" class="btn btn-secondary"
                                   data-dismiss="modal">NO</button>
                    </form>
               </div>
          </div>
     </div>
     {{-- end delete modal --}}

     {{-- end modals --}}
</div>





@endsection

@section('scripts')
<script src="{{ asset('js/product.js') }}"></script>
@endsection