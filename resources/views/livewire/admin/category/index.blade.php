 <!-- Main content dashboard  -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row align-items-center">

             @if(session('message'))

             <div class="alert alert-success" > {{ session('message')}} </div>

             @endif
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Service Category <span class="text-muted fw-normal ms-2">(counter)</span></h5>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                        <div>
                            <a href="{{ url('admin/categories/create')}}" class="btn bg-primary text-light"><i
                                    class="bx bx-plus me-1"></i> Add Service Category</a>
                        </div>


                    </div>

                </div>
            </div>
            <!-- end row -->

            <!-- FETCH FEEDBACKS -->

            <div class="table-responsive mb-4">
                <table class="table align-middle datatable dt-responsive table-check nowrap"
                    style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th scope="col"> #ID</th>
                            <th scope="col"> Name</th>
                            <th scope="col">Description</th>
                            <th style="width: 150px; min-width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck11">
                                        <label class="form-check-label" for="contacusercheck11"></label>
                                    </div>
                                </th>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a href="#"
                                        class="text-body">{{ $category->name }}</a>
                                </td>
                                <td>{{ $category->status == '1' ? 'Hidden':'Visible' }}</td>

                                <td>{{ $category->description }}</td>
                                {{-- actions  --}}
                                <td colspan="6">
                                    <div class="row">
                                    {{-- view --}}
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#viewServiceCategoryDetails"
                                                data-bs-whatever="@getbootstrap"><i class=" far fa-eye  "></i></button>
                                        </div>
                                        {{-- edit --}}

                                        <div class="col-md-4">
                                            <a href="{{ url('admin/categories/'.$category->id.'/edit') }}"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editServiceCategory" data-bs-whatever="@getbootstrap"><i
                                                    class="fas fa-pencil-alt "></i></button></a>

                                        </div>

                                        <!-- delete Service menu -->
                                        <div class="col-md-4">
                                            
                                               <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                               data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                    class="fa fa-trash"></i></button>



                                        </div>
                                    </div>
                                </td>
                            </tr>


                         
                        @endforeach


                    </tbody>
                </table>

                {{-- pagination --}}
                <div>{{ $categories->links() }}</div>


                <!-- end table -->
            </div>
            <!-- end table responsive -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    </div>
    <!-- container-fluid -->

    {{-- MODALS --}}
    <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

            
            <div class="modal-body">
            <h6>are u sure u want to delete ?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes,delete</button>
            </div>


    </div>
  </div>
</div>
    </div>