@extends('backend.layouts.app')
@section('title')
    {{ __('FAQ Section') }}
@endsection
@section('content')

    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="title-content">
                            <h2 class="title">{{ __('FAQ Section') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-tab-bars">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                @foreach($languages as $language)
                    <li class="nav-item" role="presentation">
                        <a
                            href=""
                            class="nav-link  {{ $loop->index == 0 ?'active' : '' }}"
                            id="pills-informations-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#{{$language->locale}}"
                            type="button"
                            role="tab"
                            aria-controls="pills-informations"
                            aria-selected="true"
                        ><i data-lucide="languages"></i>{{$language->name}}</a
                        >
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">

            @foreach($groupData as $key => $value)

                @php
                    $data = new Illuminate\Support\Fluent($value);
                @endphp

                <div class="tab-pane fade {{ $loop->index == 0 ?'show active' : '' }}" id="{{$key}}" role="tabpanel" aria-labelledby="pills-informations-tab">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title">{{ __('Titles and Activity') }}</h3>
                        </div>
                        <div class="site-card-body">
                            <form action="{{ route('admin.page.section.section.update') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section_code" value="faq">
                                <input type="hidden" name="section_locale" value="{{$key}}">
                                @if($key == 'en')
                                    <div class="site-input-groups row">
                                        <label for="" class="col-sm-3 col-label pt-0">{{ __('Section Visibility') }}<i
                                                data-lucide="info" data-bs-toggle="tooltip" title=""
                                                data-bs-original-title="Manage Section Visibility"></i></label>
                                        <div class="col-sm-3">
                                            <div class="site-input-groups">
                                                <div class="switch-field">
                                                    <input type="radio" id="active" name="status" @if($status) checked
                                                           @endif value="1"/>
                                                    <label for="active">{{ __('Show') }}</label>
                                                    <input type="radio" id="deactivate" name="status" @if(!$status) checked
                                                           @endif value="0"/>
                                                    <label for="deactivate">{{ __('Hide') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-input-groups row">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-label">
                                            {{ __('Right Image') }} <small>(620x458)</small>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                            <div class="wrap-custom-file">
                                                <input type="file" name="left_img" id="leftImg"
                                                       accept=".gif, .jpg, .png"/>
                                                <label for="leftImg" id="left_img" @if($data->left_img)  class="file-ok"
                                                       style="background-image: url({{ asset($data->left_img) }})" @endif>
                                                    <img class="upload-icon"
                                                         src="{{ asset('global/materials/upload.svg') }}" alt=""/>
                                                    <span>{{ __('Update Image') }}</span>
                                                </label>
                                                @removeimg($data->left_img,left_img)
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label">{{ __('FAQ Button') }}<i
                                                data-lucide="info" data-bs-toggle="tooltip" title=""
                                                data-bs-original-title="Leave it blank if you don't need this button"></i></label>
                                    <div class="col-sm-9">
                                        <div class="form-row">
                                            @if($key == 'en')
                                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="site-input-groups">
                                                        <label for="" class="box-input-label">{{ __('Button Icon') }}
                                                            <a class="link" href="https://fontawesome.com/icons" target="_blank">{{ __('Font Awesome') }} /</a>
                                                            <a class="link" href="{{ asset('frontend/default/fonts/demo.html') }}" target="_blank">{{ __('Icommon') }}</a>:
                                                        </label>
                                                        <input type="text" name="faq_button_icon" class="box-input"
                                                               value="{{ $data->faq_button_icon }}">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for=""
                                                           class="box-input-label">{{ __('Button Label') }}</label>
                                                    <input type="text" name="faq_button_level" class="box-input"
                                                           value="{{ $data->faq_button_level }}">
                                                </div>
                                            </div>
                                            @if($key == 'en')
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="site-input-groups">
                                                        <label for="" class="box-input-label">{{ __('Button URL') }}</label>
                                                        <div class="site-input-groups">
                                                            <div class="site-input-groups">
                                                                <input type="text" name="faq_button_url" class="box-input"
                                                                       value="{{ $data->faq_button_url }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="site-input-groups">
                                                        <label for="" class="box-input-label">{{ __('Target') }}</label>
                                                        <div class="site-input-groups">
                                                            <select name="faq_button_target" class="form-select">
                                                                <option @if($data->faq_button_target == '_self') selected
                                                                        @endif value="_self">{{ __('Same Tab') }}</option>
                                                                <option @if($data->faq_button_target == '_blank') selected
                                                                        @endif value="_blank">{{ __('Open In New Tab') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label">{{ __('Faq Section Title Small') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title_small" class="box-input"
                                               value="{{ $data->title_small }}">
                                    </div>
                                </div>
                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label">{{ __('Faq Section Title Big') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title_big" class="box-input"
                                               value="{{ $data->title_big }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit"
                                                class="site-btn-sm primary-btn w-100">{{ __('Save Changes') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">{{ __('Faq Section Contents') }}</h3>
                    <div class="card-header-links">
                        <a href="" class="card-header-link" type="button" data-bs-toggle="modal"
                            data-bs-target="#addNew">{{ __('Add New') }}</a>
                    </div>
                </div>
                <div class="site-card-body">
                    <div class="site-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($landingContent as $content)
                                <tr>
                                    <td>
                                        {{ $content->title }}
                                    </td>
                                    <td>{{ $content->description }}</td>
                                    <td>
                                        <button class="round-icon-btn primary-btn editContent" type="button"
                                                data-id="{{ $content->id }}">
                                            <i data-lucide="edit-3"></i>
                                        </button>
                                        <button class="round-icon-btn red-btn deleteContent" type="button"
                                                data-id="{{ $content->id }}">
                                            <i data-lucide="trash-2"></i>
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

    <!-- Modal for Add New  -->
    @include('backend.page.section.include.__add_new_faq')
    <!-- Modal for Add New How It Works End -->

    <!-- Modal for Edit -->
    @include('backend.page.section.include.__edit_faq')
    <!-- Modal for Edit  End-->

    <!-- Modal for Delete  -->
    @include('backend.page.section.include.__delete_faq')
    <!-- Modal for Delete  End-->
@endsection
@section('script')
    @include('backend.page.section.include.__section_image_remove')
    <script>
        "use strict";

        $('.editContent').on('click',function (e) {
            "use strict";
            e.preventDefault();
            var id = $(this).data('id');

            var url = '{{ route("admin.page.content-edit", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // Handle the response HTML
                    $('#target-element').html(response.html);
                    $('#editContent').modal('show');
                },
                error: function(xhr) {
                    // Handle any errors that occurred during the request
                    console.log(xhr.responseText);
                }
            });
        });

        $('.deleteContent').on('click',function (e) {
            "use strict";
            e.preventDefault();
            var id = $(this).data('id');
            $('#deleteId').val(id);
            $('#deleteContent').modal('show');
        });
    </script>
@endsection
