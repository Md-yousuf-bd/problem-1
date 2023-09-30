@extends('layouts.admin.master')
@section('page_content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card p-2 mt-1">
                        <h3 class="text-primary">Create Categoroy
                            <a href="{{ route('category.list') }}"
                                class="btn btn-primary btn-sm text-white  float-end p-2"></i> Category List
                            </a>
                        </h3>
                    </div>
                    <hr>
                    <form action="{{ route('category.store') }}" method="POST" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">name</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom02"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Organization</label>
                                    <select class="form-select" name="organization_id" id="validationCustom02" required>
                                        <option selected disabled value="">Select Organization</option>
                                        @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Description</label>
                                    <textarea name="description" required class="form-control" rows="1" required></textarea>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="d-flex justify-content-start">
                                    <button class="btn btn-primary mt-3" type="submit">Create</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
