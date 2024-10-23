@extends('backend.layouts.app')
@section('title')
{{ __('Food Categories') }}
@endsection
@section('content')
<div class="main-content">
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="title-content">
                        <h2 class="title">{{ __('All Food Categories') }}</h2>
                        <a
                            href=""
                            class="title-btn"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#addNewCategory"><i icon-name="plus-circle"></i>{{ __('Add New') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="site-card">
                    <div class="site-card-body">
                        <div class="site-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('#') }}</th>
                                        <th scope="col">{{ __('Icon') }}</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Is Featured') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{++$loop->index}}</td>
                                        <td>
                                            <img style="max-width: 50px" src="{{ asset($category->icon) }}">
                                        </td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            @if($category->is_featured == 1)
                                            <div class="site-badge success">{{ __('Yes') }}</div>
                                            @else
                                            <div class="site-badge danger">{{ __('No') }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>
                                                @if($category->status == 1)
                                                <div class="site-badge success">{{ __('Active') }}</div>
                                                @else
                                                <div class="site-badge danger">{{ __('Dactive') }}</div>
                                                @endif
                                            </strong>
                                        </td>
                                        <td>
                                            <button class="round-icon-btn primary-btn" type="button" id="edit" data-id="{{ $category->id }}">
                                                <i icon-name="edit-3"></i>
                                            </button>

                                            <button type="button" class="round-icon-btn primary-btn" id="delete" data-id="{{ $category->id }}">
                                                <i icon-name="delete"></i>
                                            </button>

                                            <form id="deleteForm{{ $category->id }}" action="{{ route('admin.food-category.destroy', $category->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.food_category.modal.__new_category')
    @include('backend.food_category.modal.__edit_category')
    @include('backend.food_category.modal.__delete_category')
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            "use strict";

            // Show the edit modal when the edit button is clicked
            $('body').on('click', '#edit', function (event) {
                event.preventDefault();
                var id = $(this).data('id');

                $.get('/admin/food-category/' + id + '/edit', function (data) {
                    var url = '{{ route("admin.food-category.update", ":id") }}';
                    url = url.replace(':id', id);
                    $('#editForm').attr('action', url);

                    // Populate the modal fields with data
                    $('#name').val(data.name);
                    $('input[name="status"][value="' + data.status + '"]').prop('checked', true);
                    $('input[name="is_featured"][value="' + data.is_featured + '"]').prop('checked', true);

                    $('label[for=editThumbImage]').addClass('file-ok');
                    $('label[for=editThumbImage]').css('background', 'url(' + data.icon + ')');

                    // Show the modal
                    $('#editModal').modal('show');
                });
            });
        });


        $(document).ready(function () {
            "use strict";

            // Trigger delete confirmation modal
            $('body').on('click', '#delete', function (event) {
                event.preventDefault();
                var id = $(this).data('id');

                // Update the form action with the category ID
                var formAction = '{{ route("admin.food-category.destroy", ":id") }}';
                formAction = formAction.replace(':id', id);
                $('#deleteForm').attr('action', formAction);

                // Show the delete confirmation modal
                $('#deleteConfirmationModal').modal('show');
            });

            // Confirm delete
            $('#confirmDeleteBtn').on('click', function () {
                // Submit the delete form
                $('#deleteForm').submit();
            });
        });
    </script>

@endsection