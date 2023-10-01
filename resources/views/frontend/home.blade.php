@extends('layouts.frontend.master')
@section('content')
    <div class="row ">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('submission.store') }}" method="POST" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 border p-3">
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <h1 class="text-center mb-4 mt-2 text-primary">Send your information</h1>
                                <div class="row ">
                                    {{-- organization --}}
                                    <div class="mb-3 col-6">
                                        <label for="" class="fw-bold mb-2">Organization</label>
                                        <select name="organization_id" id="organization" class="form-control">
                                            <option value="null">Select Organization name</option>
                                            @foreach ($organizations as $organization)
                                                <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--  category --}}
                                    <div class="mb-3 col-6">
                                        <label for="" class="fw-bold mb-2">Category</label>
                                        <select name="category_id" class="form-control" id="category">
                                            <option value="">Select a category</option>
                                        </select>
                                    </div>
                                    {{-- name --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">name</label>
                                            <input type="text" name="name" class="form-control"
                                                id="validationCustom02" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                id="validationCustom02" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">Number</label>
                                            <input type="number" name="number" class="form-control"
                                                id="validationCustom02" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control"
                                                id="validationCustom02" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control"
                                                id="validationCustom02" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label for="validationCustom03" class="form-label">Gender</label>
                                            <div class="d-flex ">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="male" name="gender"
                                                        type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" value="fmale" name="gender"
                                                        type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                                        checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="form-check ms-2">
                                                    <input class="form-check-input" value="other" name="gender"
                                                        type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                                        checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Other
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">Description</label>
                                            <textarea name="description" required class="form-control" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    {{-- template --}}
                                    {{-- <div class="mb-3 col-6">
                                        <label for="" class="fw-bold mb-2">Template</label>
                                        <select name="template_id" class="form-control" id="template">
                                            <option value="">Select a Template</option>
                                        </select>
                                    </div> --}}
                                    {{-- field --}}
                                    {{-- <div class="mb-3 col-6">
                                        <label for="" class="fw-bold mb-2">Field</label>
                                        <select name="field" class="form-control" id="field">
                                            <option value="">Select a field</option>
                                        </select>
                                    </div> --}}

                                    {{-- submit button  --}}
                                    @if (auth()->check())
                                        <div class="mb-3 col-12">
                                            <button type="submit" class="btn btn-primary float-end">Save</button>
                                        </div>
                                    @else
                                        <div class="mb-3 col-12">
                                            <a href="{{ route('login') }}" type="button"
                                                class="btn btn-sm btn-danger  waves-effect waves-light mb-2 me-1"
                                                class="btn btn-sm btn-danger">You need to be logged in to save.</a>
                                        </div>
                                    @endif
                                </div>

                                {{-- information submit tabla  --}}
                                <div class="">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="responsive table table-borderd ">
                                                <thead>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($submissions as $key  => $submission)
                                                        <tr>

                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $submission->organization->name }}</td>
                                                            <td>{{ $submission->category->name }}</td>
                                                            <td>{{ $submission->name ?? '' }}</td>
                                                            <td>{{ $submission->email ?? '' }}</td>
                                                            <td>{{ $submission->number ?? '' }}</td>
                                                            <td>{{ $submission->address ?? '' }}</td>
                                                            <td>{{ $submission->date ?? '' }}</td>
                                                            <td>{{ $submission->gender ?? '' }}</td>
                                                            <td>{{ substr($submission->description, 0, 80) }}...</td>

                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="13" class="text-danger text-center">No Information submit</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Triggered when category dropdown value changes
            $('#organization').change(function() {
                var organization_id = $(this).val();

                // Clear the existing subcategory dropdown
                $('#category').empty();
                $('#category').append('<option value="">Select a subcategory</option>');

                // Make the AJAX request
                if (organization_id !== '') {
                    $.ajax({
                        url: "{{ route('getCategories', '') }}/" + organization_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#category').append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    });
                }
            });

            //template
            $('#category').change(function() {
                var category_id = $(this).val();

                $('#template').empty();
                $('#template').append('<option value="">Select a Template</option>');

                if (category_id !== '') {
                    $.ajax({
                        url: "{{ route('getTemplate', '') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#template').append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    });
                }
            });
            //from
            $('#template').change(function() {
                var template_id = $(this).val();

                $('#field').empty();
                $('#field').append('<option value="">Select a field</option>');

                if (template_id !== '') {
                    $.ajax({
                        url: "{{ route('getField', '') }}/" + template_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#field').append('<input type="text" value="' + key +
                                    '"> ' + value + '</input>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
