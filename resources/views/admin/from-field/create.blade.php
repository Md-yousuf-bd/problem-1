@extends('layouts.admin.master')

@section('page_content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card p-2 mt-1">
                        <h3 class="text-primary">
                            Create Fields
                            <a href="{{ route('field.list') }}" class="btn btn-primary btn-sm text-white float-end p-2">
                                List
                            </a>
                        </h3>
                    </div>
                    <hr>
                    <form action="{{ route('field.store') }}" method="POST" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="validationCustom02" class="form-label">Template Name</label>
                                <select class="form-select" name="template_id" id="validationCustom02"
                                    required>
                                    <option selected disabled value="">Select template</option>
                                    @foreach ($templates as $template)
                                        <option value="{{ $template->id }}">{{ $template->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="repeater-container">
                            <div class="repeater-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">Field Name</label>
                                            <input type="text" name="name[]" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="validationCustom02" class="form-label">Field Type</label>
                                            <select class="form-select" name="type[]" id="validationCustom02" required>
                                                <option selected disabled value="">Select Type</option>
                                                <option value="text">Text</option>
                                                <option value="number">Number</option>
                                                <option value="file">File</option>
                                                <option value="email">Email</option>
                                                <option value="date">Date</option>
                                                <option value="time">Time</option>
                                                <option value="password">Password</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="d-flex justify-content-start">
                                        <button class="btn btn-danger mt-3 remove-field" type="button">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success mt-3" type="button" id="add-field">Add Field</button>
                        <button class="btn btn-primary mt-3" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const repeaterContainer = document.getElementById('repeater-container');
            const addFieldButton = document.getElementById('add-field');

            addFieldButton.addEventListener('click', function() {
                const repeaterItem = document.querySelector('.repeater-item').cloneNode(true);
                repeaterContainer.appendChild(repeaterItem);
            });

            repeaterContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-field')) {
                    e.target.closest('.repeater-item').remove();
                }
            });
        });
    </script>
@endsection
