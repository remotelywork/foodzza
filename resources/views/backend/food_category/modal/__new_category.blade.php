<div
    class="modal fade"
    id="addNewCategory"
    tabindex="-1"
    aria-labelledby="addNewCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content site-table-modal">
            <div class="modal-body popup-body">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="popup-body-text">
                    <h3 class="title mb-4">{{ __('Add New Category') }}</h3>
                    <form action="{{route('admin.food-category.store')}}" method="post">
                        @csrf
                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Icon:') }}</label>
                            <div class="wrap-custom-file">
                                <input type="file" name="icon" id="icon" accept=".gif, .jpg, .png" required />
                                <label for="thumbImage">
                                    <img class="upload-icon" src="{{asset('global/materials/upload.svg')}}" alt="" />
                                    <span>{{ __('Upload Icon') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Category Name') }}</label>
                            <input
                                type="text"
                                name="name"
                                class="box-input mb-0"
                                placeholder=""
                                required="" />
                        </div>
                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Is Featured:') }}</label>
                            <div class="switch-field same-type">
                                <input type="radio" id="radio-five" name="is_featured" checked="" value="1" />
                                <label for="radio-five">{{ __('Active') }}</label>
                                <input type="radio" id="radio-six" name="is_featured" value="0" />
                                <label for="radio-six">{{ __('Deactivate') }}</label>
                            </div>
                        </div>
                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Status:') }}</label>
                            <div class="switch-field same-type">
                                <input type="radio" id="radio-five" name="status" checked="" value="1" />
                                <label for="radio-five">{{ __('Active') }}</label>
                                <input type="radio" id="radio-six" name="status" value="0" />
                                <label for="radio-six">{{ __('Deactivate') }}</label>
                            </div>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                {{ __('Add Category') }}
                            </button>
                            <a
                                href="#"
                                class="site-btn-sm red-btn"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                                <i icon-name="x"></i>
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>