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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="responsive table table-borderd ">
                            <thead>
                                <tr>
                                    <tr>
                                        <th>SL</th>
                                        <th>Organization</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th>Gender</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($submissions as $key  => $submission)
                                    <tr>

                                        <td>{{ $key+ 1}}</td>
                                        <td>{{ $submission->organization->name }}</td>
                                        <td>{{ $submission->category->name }}</td>
                                        <td>{{ $submission->name }}</td>
                                        <td>{{ $submission->email }}</td>
                                        <td>{{ $submission->number }}</td>
                                        <td>{{ $submission->address }}</td>
                                        <td>{{ $submission->date }}</td>
                                        <td>{{ $submission->gender }}</td>
                                        <td>{{ substr($submission->description, 0,  80) }}...</td>
                                            <td>
                                                <a type="button"
                                                    href="{{ route('submission.delete',$submission->id) }}"
                                                    onclick="return confirm('Are you sure, you want to delete ')"
                                                    class="btn btn-sm mb-2 me-1 btn-danger btn-rounded waves-effect waves-light">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-danger text-center">No Infromation Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                        {{ $submissions->links() }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
