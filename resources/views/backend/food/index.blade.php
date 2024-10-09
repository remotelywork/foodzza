@extends('backend.layouts.app')
@section('title')
    {{ __('Food Items') }}
@endsection
@section('style')
    <script src="{{ asset('global/js/jquery.min.js') }}"></script>
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title">{{ __($title) }}</h2>
                            @can('role-create')
                                <a href="{{ route('admin.food-item.create') }}" class="title-btn"><i
                                            icon-name="plus-circle"></i>{{ __('Add New Item') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="site-card">
                <div class="site-card-body">
                    <div class="site-table table-responsive">
                        <form action="{{ request()->url() }}" method="get">
                            <div class="table-filter d-flex justify-content-between">
                                <div class="filter d-flex">
                                    <div class="search">
                                        <input type="text" id="search" name="query" value="{{ request('query') }}" placeholder="Search" />
                                    </div>
                                    <button type="submit" class="apply-btn ms-2"><i data-lucide="search"></i>{{ __('Search') }}</button>
                                </div>
                                <div class="filter d-flex">
                                    <select class="form-select form-select-sm me-2" name="filter_by_category" aria-label=".form-select-sm example">
                                        <option value="" selected>{{ __('Filter By Category') }}</option>
                                        @foreach($foodCategories as $foodCategory)
                                            <option value="{{ $foodCategory->id }}" {{ request('filter_by_category') == $foodCategory->id ? 'selected' : '' }}>{{ __($foodCategory->name) }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Delivery Cost') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($foodItems as $foodItem)
                                <tr>
                                    <td><img style="max-width: 35px" src="{{ asset($foodItem->thumb_image) }}"></td>
                                    <td>{{ $foodItem->name }}</td>
                                    <td>{{ $foodItem->foodCategory->name }}</td>
                                    <td>{{ $foodItem->price }}</td>
                                    <td>{{ $foodItem->quantity }}</td>
                                    <td>
                                        @if($foodItem->shipping_cost == null)
                                            N/A
                                        @else
                                            {{ $foodItem->shipping_cost }}
                                            @endif
                                    </td>
                                    <td>
                                        @if($foodItem->status == 1)
                                            <div class="site-badge success">{{ __('Active') }}</div>
                                        @else
                                            <div class="site-badge danger">{{ __('Dactive') }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.food-item.edit',$foodItem->id) }}" class="round-icon-btn primary-btn" type="button" id="edit"
                                                data-id="{{ $foodItem->id }}" >
                                            <i icon-name="edit-3"></i>
                                        </a>
                                        <form action="{{ route('admin.food-item.destroy', $foodItem->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="round-icon-btn primary-btn" id="delete" data-id="{{ $foodItem->id }}">
                                                <i icon-name="delete"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8" class="text-center">{{ __('No Data Found!') }}</td>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection