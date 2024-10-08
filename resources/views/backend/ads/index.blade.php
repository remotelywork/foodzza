@extends('backend.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="main-content">

        <div class="page-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="title-content">
                            <h2 class="title">{{ $title }}</h2>
                            @can('ads-create')
                                <a href="{{ route('admin.ads.create') }}" class="title-btn"><i data-lucide="plus-circle"></i>{{ __('Add New') }}</a>
                            @endcan
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
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Type') }}</th>
                                        <th scope="col">{{ __('Duration') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Posted By') }}</th>
                                        <th scope="col">{{ __('Max Views') }}</th>
                                        <th scope="col">{{ __('Total Views') }}</th>
                                        <th scope="col">{{ __('Remaining Views') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($ads as $ad)
                                            <tr>
                                                <td>
                                                    <strong>{{ $ad->title }}</strong>
                                                </td>
                                                <td>
                                                    @if($ad->type == App\Enums\AdsType::Link)
                                                        <div class="site-badge success"> {{ __('Link') }}</div>
                                                    @elseif($ad->type == App\Enums\AdsType::Script)
                                                        <div class="site-badge danger">{{ __('Script') }}</div>
                                                    @elseif($ad->type == App\Enums\AdsType::Image)
                                                        <div class="site-badge pending">{{ __('Image') }}</div>
                                                    @elseif($ad->type == App\Enums\AdsType::Youtube)
                                                        <div class="site-badge danger">{{ __('Youtube') }}</div>
                                                    @endif
                                                </td>
                                                <td>{{ $ad->duration }} {{ __('Sec') }}</td>
                                                <td>{{ $currencySymbol.$ad->amount }}</td>
                                                <td>
                                                    @if($ad->user_id == 0)
                                                    {{ __('Admin') }}
                                                    @else
                                                    <a href="{{ route('admin.user.edit',$ad->user_id) }}" class="link">{{ Str::limit($ad->user?->username,15) }}</a>
                                                    @endif
                                                </td>
                                                <td>{{ $ad->max_views }}</td>
                                                <td>{{ $ad->total_views }}</td>
                                                <td>{{ $ad->remaining_views }}</td>
                                                <td>
                                                    @if($ad->status == App\Enums\AdsStatus::Active)
                                                        <div class="site-badge success">{{ __('Active') }}</div>
                                                    @elseif($ad->status == App\Enums\AdsStatus::Inactive)
                                                        <div class="site-badge danger">{{ __('Inactive') }}</div>
                                                    @elseif($ad->status == App\Enums\AdsStatus::Pending)
                                                        <div class="site-badge pending">{{ __('Pending') }}</div>
                                                    @elseif($ad->status == App\Enums\AdsStatus::Rejected)
                                                        <div class="site-badge danger">{{ __('Rejected') }}</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('ads-edit')
                                                        <a href="{{ route('admin.ads.edit',$ad->id) }}" class="round-icon-btn primary-btn" id="edit" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit ads">
                                                            <i data-lucide="edit-3"></i>
                                                        </a>
                                                    @endcan
                                                    @can('ads-delete')
                                                        <a href="#" class="round-icon-btn red-btn" id="deleteBtn" data-id="{{ $ad->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Delete ads">
                                                            <i data-lucide="trash"></i>
                                                        </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                        <td colspan="10" class="text-center">{{ __('No Data Found!') }}</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                @include('backend.ads.include.__delete_modal')
                            </div>
                            {{ $ads->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('script')
    <script>
        (function ($) {
            "use strict";

            // Delete Modal
            $('body').on('click', '#deleteBtn', function () {
                var id = $(this).data('id');
                var url = '{{ route("admin.ads.delete", ":id") }}';
                url = url.replace(':id', id);
                
                $('#deleteForm').attr('action', url);
                $('#deleteModal').modal('show');
            });

        })(jQuery);
    </script>
@endsection