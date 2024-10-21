@extends('backend.layouts.app')
@section('title')
    {{ __('Add New Item') }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('backend/css/choices.min.css') }}">
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="title-content">
                            <h2 class="title">{{ __('Add New Food') }}</h2>
                            <a href="{{ url()->previous() }}" class="title-btn"><i
                                        icon-name="corner-down-left"></i>{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="site-card">
                        <div class="site-card-body">
                            <form action="{{route('admin.food-item.store')}}" method="post" enctype="multipart/form-data" class="row site-input-groups">
                                @csrf
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="site-input-groups">
                                                <label class="box-input-label" for="">{{ __('Thumbnail Image:') }}</label>
                                                <div class="wrap-custom-file">
                                                    <input type="file" name="thumb_image" id="thumbImage" accept=".gif, .jpg, .png" required />
                                                    <label for="thumbImage">
                                                        <img class="upload-icon" src="{{asset('global/materials/upload.svg')}}" alt="" />
                                                        <span>{{ __('Upload Thumbnail') }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 schema-name">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Name:') }}</label>
                                        <input type="text" name="name" class="box-input" placeholder="Item name" required />
                                    </div>
                                </div>

                                <div class="col-xl-6 ">
                                    <label class="box-input-label" for="">{{ __('Price:') }}</label>
                                    <div class="input-group joint-input">
                                        <input type="text" name="price"  class="form-control" required />
                                        <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                    </div>
                                </div>

                                <div class="col-xl-6 ">
                                    <label class="box-input-label" for="">{{ __('Discount Price:') }}</label>
                                    <div class="input-group joint-input">
                                        <input type="text" name="discount_price"  class="form-control" />
                                        <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                    </div>
                                </div>

                                <div class="col-xl-6 number-period">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Discount Validity:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="datetime-local" name="discount_validity" class="form-control" placeholder="Discount Validity" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Select Category:') }}</label>
                                        <select id="choices-multiple-remove-button" name="category[]" class="form-select" placeholder="select category" multiple required>
                                            <option value="" disabled >{{ __('Select category') }}</option>
                                            @foreach($foodCategories as $foodCategory)
                                                <option value="{{ $foodCategory->id }}"> {{ $foodCategory->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 ">
                                    <label class="box-input-label" for="">{{ __('Shipping Price:') }}</label>
                                    <div class="input-group joint-input">
                                        <input type="text" name="shipping_cost"  class="form-control" />
                                        <span class="input-group-text">{{ setting('site_currency','global') }}</span>
                                    </div>
                                </div>

                                <div class="col-xl-6  cancel-expiry">
                                    <div class="site-input-groups">
                                        <label class="box-input-label"
                                               for="">{{ __('Quantity:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="text" placeholder="quantity" name="quantity" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Status:') }}</label>
                                        <div class="switch-field same-type">
                                            <input type="radio" id="radio-five" name="status" checked=""  value="1" />
                                            <label for="radio-five">{{ __('Active') }}</label>
                                            <input type="radio" id="radio-six" name="status" value="0" />
                                            <label for="radio-six">{{ __('Deactivate') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <a href="javascript:void(0)" id="generate"
                                       class="site-btn-xs primary-btn mb-3">{{ __('Add Complimentary Item') }}</a>
                                </div>

                                <div class="addOptions">

                                </div>
                                <div class="col-xl-3">
                                    <a href="javascript:void(0)" id="generateImage"
                                       class="site-btn-xs primary-btn mb-3">{{ __('Add Gallery Image') }}</a>
                                </div>
                                <div class="addImages row">

                                </div>

                                <div class="col-xl-12">
                                    <div class="site-input-groups">
                                        <label for=""
                                               class="col-sm-3 col-label">{{ __('Item Overview:') }}</label>
                                        <div class="col-sm-12">
                                            <textarea name="overview" class="form-textarea summernote" placeholder="Content"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <button type="submit" class="site-btn-sm primary-btn w-100">
                                        {{ __('Add New Item') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend/js/choices.min.js') }}"></script>

    <script>
        $(document).ready(function (e) {
            var i = 0;
            "use strict";

            $("#generate").on('click', function () {
                ++i;
                var form = `<div class="mb-4">
                  <div class="option-remove-row row ">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="site-input-groups">
                        <input name="fields[` + i + `][name]" class="box-input" type="text" value="" placeholder="Item Name">
                      </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="site-input-groups">
                        <input name="fields[` + i + `][price]" class="box-input" type="number" value="" placeholder="price">
                      </div>
                    </div>

                    <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-12">
                      <button class="delete-option-row delete_desc" type="button">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    </div>
                  </div>`;
                $('.addOptions').append(form)
            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.option-remove-row').parent().remove();
            });
        });
    </script>
    <script>
        $(document).ready(function (e) {
            var j = 0;
            "use strict";

            // Add Gallery Image
            $("#generateImage").on('click', function () {
                ++j;
                var imageForm = `
                <div class="col-xl-3 mb-4">
                    <div class="site-input-groups image-remove-row">
                        <label class="box-input-label" for="">{{ __('Galary Image:') }}</label>
                        <div class="wrap-custom-file">
                            <input type="file" name="galleries[]" id="gallery-image-` + j + `" accept=".gif, .jpg, .png" />
                            <label for="gallery-image-` + j + `">
                                <img class="upload-icon" src="{{asset('global/materials/upload.svg')}}" alt="" />
                                <span>{{ __('Upload Galary Image') }}</span>
                            </label>
                        </div>
                        <button class="delete-image-row delete_image" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>`;
                $('.addImages').append(imageForm);

                imagePreview();
            });

            // Remove Gallery Image
            $(document).on('click', '.delete_image', function () {
                $(this).closest('.col-xl-3').remove();
            });
        });
    </script>

    <script src="{{ asset('backend/js/choices.min.js') }}"></script>
    <script>
        (function ($) {
            'use strict';

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,

            });

        })(jQuery)
    </script>


@endsection

