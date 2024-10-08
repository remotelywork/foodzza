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
                                    data-bs-target="#addNewCategory"
                            ><i icon-name="plus-circle"></i>{{ __('Add New') }}</a>
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
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{++$loop->index}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                <strong>
                                                    @if($category->status == 1)
                                                        Active
                                                        @else
                                                        Dactive
                                                        @endif
                                                </strong>
                                            </td>
                                            <td>
                                                <button
                                                        class="round-icon-btn primary-btn"
                                                        type="button"
                                                        id="edit"
                                                        data-id="{{ $category->id }}"
                                                >
                                                    <i icon-name="edit-3"></i>
                                                </button>
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
    </div>
@endsection

@section('script')
    <script>

        $('body').on('click', '#edit', function (event) {
            "use strict";
            event.preventDefault();
            var id = $(this).data('id');

            $.get('/admin/food-category/' + id + '/edit', function (data) {

                var url = '{{ route("admin.food-category.update", ":id") }}';
                url = url.replace(':id', id);
                $('#editForm').attr('action', url);

                // Populate the modal fields with data
                $('#name').val(data.name);
                $('select[name="status"]').val(data.status);

                // Show the modal after data is populated
                $('#editModal').modal('show');
            });
        });



    </script>
@endsection
