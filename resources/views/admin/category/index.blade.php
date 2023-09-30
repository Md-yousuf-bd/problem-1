@extends('layouts.admin.master')
@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="card-header">
                    <h3 class="text-primary">Category List
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm text-white  float-end ">Add
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="responsive table table-borderd ">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Organization name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $key  => $category)
                                    <tr>

                                        <td>{{ $key+ 1}}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->organization->name }}</td>
                                        <td>{{ substr($category->description, 0,  80) }}...</td>
                                            <td>
                                                <a href="{{ route('category.edit',$category->id) }}"
                                                    type="button"
                                                    class="btn btn-sm btn-success btn-rounded waves-effect waves-light mb-2 me-1"
                                                    class="btn btn-sm btn-success"> <i class="mdi mdi-pencil"></i></a>

                                                <a type="button"
                                                    href="{{ route('category.delete',$category->id) }}"
                                                    onclick="return confirm('Are you sure, you want to delete ')"
                                                    class="btn btn-sm mb-2 me-1 btn-danger btn-rounded waves-effect waves-light">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-danger text-center">No category Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                        {{ $categories->links() }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
