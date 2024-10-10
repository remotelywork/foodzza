@extends('backend.layouts.app')
@section('title')
    {{ __('Edit Item') }}
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
                            <h2 class="title">{{ __('Edit Item') }}</h2>
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
                            <form action="{{route('admin.food-item.update',$food_detail->id)}}" method="post" enctype="multipart/form-data" class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="site-input-groups">
                                                <label class="box-input-label" for="">{{ __('Thumbnail Image:') }}</label>
                                                <div class="wrap-custom-file">
                                                    <input type="file" name="thumb_image" value="{{ $food_detail->thumb_image }}" id="thumbImage" accept=".gif, .jpg, .png" />
                                                    <label for="thumbImage">
                                                        <img class="upload-icon" src="{{ asset($food_detail->thumb_image) }}" alt="" />
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
                                        <input type="text" name="name" class="box-input" value="{{ $food_detail->name }}" required />
                                    </div>
                                </div>
                                <div class="col-xl-6 schema-badge">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Price:') }}</label>
                                        <input type="number" class="box-input" value="{{ $food_detail->price }}" name="price" required />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups row">
                                        <div class="col-xl-12">
                                            <label class="box-input-label" for="">{{ __('Discount Price:') }}</label>
                                            <div class="position-relative">
                                                <input type="number" class="box-input" value="{{ $food_detail->discount_price }}"  name="discount_price"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 number-period">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Discount Validity:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="datetime-local" name="discount_validity" class="form-control"
                                                   value="{{ \Carbon\Carbon::parse($food_detail->discount_validity)->format('Y-m-d\TH:i') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Select Category:') }}</label>
                                        <select name="category" class="form-select" required>
                                            <option value="" disabled selected>{{ __('Select category') }}</option>
                                            @foreach($foodCategories as $foodCategory)
                                                <option value="{{ $foodCategory->id }}" @if($food_detail->category == $foodCategory->id ) selected @endif> {{ $foodCategory->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6  cancel-expiry">
                                    <div class="site-input-groups">
                                        <label class="box-input-label"
                                               for="">{{ __('Delivery Cost:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="text" value="{{ $food_detail->shipping_cost }}" name="shipping_cost" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6  cancel-expiry">
                                    <div class="site-input-groups">
                                        <label class="box-input-label"
                                               for="">{{ __('Quantity:') }}</label>
                                        <div class="input-group joint-input">
                                            <input type="number" value="{{ $food_detail->quantity }}" name="quantity" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Status:') }}</label>
                                        <div class="switch-field same-type">
                                            <input type="radio" id="radio-five" name="status" @if($food_detail->status == 1) checked @endif  value="1" />
                                            <label for="radio-five" >{{ __('Active') }}</label>
                                            <input type="radio" id="radio-six" name="status" @if($food_detail->status == 0) checked @endif value="0" />
                                            <label for="radio-six">{{ __('Deactive') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <a href="javascript:void(0)" id="generate" class="site-btn-xs primary-btn mb-3">{{ __('Add Complimentary Item') }}</a>
                                </div>

                                <div class="addOptions row">
                                    @if($food_detail->complimentary_items)
                                        @foreach(($food_detail->complimentary_items) as $key => $item)
                                            <div class="col-xl-12 mb-4 existing-option">
                                                <div class="option-remove-row row">
                                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="site-input-groups">
                                                            <input name="existing_fields[{{ $key }}][name]" class="box-input" type="text" value="{{ $item['name'] }}" placeholder="Item Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="site-input-groups">
                                                            <input name="existing_fields[{{ $key }}][price]" class="box-input" type="number" value="{{ $item['price'] }}" placeholder="Price">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <button class="delete-option-row delete_existing_desc" type="button" data-key="{{ $key }}">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <input type="hidden" name="deleted_items" id="deletedItems" value="">



                                <div class="col-xl-3">
                                    <a href="javascript:void(0)" id="generateImage"
                                       class="site-btn-xs primary-btn mb-3">{{ __('Add Gallery Image') }}</a>
                                </div>
                                <div class="addImages row">
                                    @if(is_array($food_detail['images']))
                                        @foreach($food_detail->images as $key => $image)
                                            <div class="col-xl-3 mb-4 existing-image">
                                                <div class="site-input-groups image-remove-row">
                                                    <label class="box-input-label" for="">{{ __('Gallery Image:') }}</label>
                                                    <div class="wrap-custom-file">
                                                        <img src="{{ asset($image) }}" alt="Gallery Image" class="img-fluid" />
                                                        <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                                    </div>
                                                    <button class="delete-image-row delete_existing_image" type="button" data-image="{{ $image }}">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <input type="hidden" name="deleted_images" id="deletedImages" value="">

                                <div class="col-xl-12">
                                    <div class="site-input-groups">
                                        <label for=""
                                               class="col-sm-3 col-label">{{ __('Item Overview:') }}</label>
                                        <div class="col-sm-12">
                                            <textarea name="overview" class="form-textarea summernote" placeholder="Content">{{ $food_detail->overview }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <button type="submit" class="site-btn-sm primary-btn w-100">
                                        {{ __('Update Item') }}
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
            var i = $('.addOptions .existing-option').length; // Start from the count of existing items
            "use strict";

            // Add new complimentary item
            $("#generate").on('click', function () {
                ++i;
                var form = `
        <div class="col-xl-12 mb-4 new-option">
            <div class="option-remove-row row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-input-groups">
                        <input name="fields[` + i + `][name]" class="box-input" type="text" value="" placeholder="Item Name">
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="site-input-groups">
                        <input name="fields[` + i + `][price]" class="box-input" type="number" value="" placeholder="Price">
                    </div>
                </div>

                <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-12">
                    <button class="delete-option-row delete_desc" type="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>`;
                $('.addOptions').append(form);
            });

            // Remove new complimentary item
            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.option-remove-row').parent().remove();
            });

            // Remove existing complimentary item
            $(document).on('click', '.delete_existing_desc', function () {
                var key = $(this).data('key');
                $(this).closest('.option-remove-row').parent().remove();

                // Add the item key to the deleted items list
                var deletedItems = $('#deletedItems').val();
                deletedItems += key + ',';
                $('#deletedItems').val(deletedItems);
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
        <div class="col-xl-3 mb-4 new-image">
            <div class="site-input-groups image-remove-row">
                <label class="box-input-label" for="">{{ __('Gallery Image:') }}</label>
                <div class="wrap-custom-file">
                    <input type="file" name="galleries[]" id="gallery-image-` + j + `" accept=".gif, .jpg, .png" />
                    <label for="gallery-image-` + j + `">
                        <img class="upload-icon" src="{{ asset('global/materials/upload.svg') }}" alt="" />
                        <span>{{ __('Upload Gallery Image') }}</span>
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

            // Remove existing gallery images
            $(document).on('click', '.delete_existing_image', function () {
                var image = $(this).data('image');
                $(this).closest('.col-xl-3').remove();

                // Add the image to the deleted images list
                var deletedImages = $('#deletedImages').val();
                deletedImages += image + ',';
                $('#deletedImages').val(deletedImages);
            });
        });

    </script>


@endsection

