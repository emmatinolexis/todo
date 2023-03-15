@extends('layouts.master')
@section('page-title', 'Todos')
@section('page-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"
        integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Todo</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Todo</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Task Lists</h4>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="#"><button type="button" class="btn btn-success add-btn"
                                            data-bs-toggle="modal" id="create-btn" data-bs-target="#createModal"><i
                                                class="ri-add-line align-bottom me-1"></i>Create
                                            Task</button></a>
                                    {{-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                            class="ri-delete-bin-2-line"></i></button> --}}
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="task_table" data-server-side="true"
                                data-ajax="{{ route('task.index') }}">
                                <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="customer_name">Title</th>
                                        <th class="sort" data-sort="email">Description</th>
                                        <th class="sort" data-sort="date">Start Date</th>
                                        <th class="sort" data-sort="phone">End Date</th>
                                        <th class="sort" data-sort="phone">Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                </thead>

                            </table>

                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>

    {{-- create modal --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Create Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="route('todo.store')" method="Post" id="create_task_form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Title</label>
                                    <input type="text" name="title" required class="form-control"
                                        placeholder="Enter Task Title">
                                </div>
                            </div>
                            <!--end col-->
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" cols="7" required class="form-control"></textarea>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="lastName" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" placeholder="Price">
                                </div>
                            </div>

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">End Date</label>
                                    <input type="date" name="end_date" required class="form-control">
                                </div>
                            </div>
                            <button type="submit" id="sendbtn" class="btn btn-primary">Create Task</button>
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- update modal --}}
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Update task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="route('todo.update')" method="Post" id="update_task_form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" required class="form-control"
                                        placeholder="Enter Task Title">
                                </div>
                            </div>
                            <!--end col-->
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" cols="7" required class="form-control"></textarea>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="lastName" class="form-label">Start Date</label>
                                    <input id="start_date" type="date" name="start_date" class="form-control"
                                        placeholder="Price">
                                </div>
                            </div>

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">End Date</label>
                                    <input id="end_date" type="date" name="end_date" required class="form-control">
                                </div>
                            </div>
                            <button id="updatebtn" type="submit" class="btn btn-primary">Create Task</button>
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.preloader.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/task.js') }}"></script>



@endsection
