@extends('layouts.admin.master')
@section('page_content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card p-2 mt-1">
                        <h3 class="text-primary">Edit Category
                            <a href="{{ route('category.list') }}"
                                class="btn btn-primary btn-sm text-white  float-end p-2"></i>
                                Category List
                            </a>
                        </h3>
                    </div>
                    <hr>
                    <form action="{{ route('category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Name</label>
                                    <input type="text" value="{{ $category->name }}" name="name"
                                        class="form-control" id="validationCustom02" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Oraganization</label>
                                    <select class="form-select" name="organization_id" id="validationCustom02" >
                                        <option selected disabled value="">Select Category</option>
                                        @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}" {{ $organization->id == $category->organization_id ? 'selected' : '' }} >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Description</label>
                                    <textarea name="description"  class="form-control" rows="1" >{{ $category->description }}</textarea>
                                </div>
                            </div>

                        </div>
                        {{-- preview image  --}}
                        <div class="row mt-2">
                            <div class="d-flex justify-content-start">
                                <button class="btn btn-primary mt-3" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
