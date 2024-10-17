@extends('backend.layouts.app')
@section('title')
    {{ __('Promo Codes') }}
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
                                <a href="{{ route('admin.promo-code.create') }}" class="title-btn"><i
                                            icon-name="plus-circle"></i>{{ __('Add New Promo Code') }}</a>
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
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Code') }}</th>
                                {{--<th>{{ __('Discount Type') }}</th>--}}
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Validity') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($promoCodes as $promoCode)
                                <tr>

                                    <td>{{ $promoCode->name }}</td>
                                    <td>{{ $promoCode->code }}</td>
                                    {{--<td>{{ $promoCode->discount_type }}</td>--}}
                                    <td>{{ $currencySymbol }}{{ $promoCode->amount }}</td>
                                    <td>{{ $promoCode->validity }}  </td>
                                    <td>
                                        @if($promoCode->status == 1)
                                            <div class="site-badge success">{{ __('Active') }}</div>
                                        @else
                                            <div class="site-badge danger">{{ __('Dactive') }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.promo-code.edit',$promoCode->id) }}" class="round-icon-btn primary-btn" type="button" id="edit"
                                           data-id="{{ $promoCode->id }}" >
                                            <i icon-name="edit-3"></i>
                                        </a>
                                        <form action="{{ route('admin.promo-code.destroy', $promoCode->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="round-icon-btn primary-btn" id="delete" data-id="{{ $promoCode->id }}">
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