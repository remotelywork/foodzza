<div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-labelledby="editCategoryModalLabel"
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
                    <h3 class="title mb-4">{{ __('Edit Category') }}</h3>
                    <form action="" id="editForm" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Icon:') }}</label>
                            <div class="wrap-custom-file">
                                <input type="file" name="icon" id="editThumbImage" accept=".gif, .jpg, .png" />
                                <label for="editThumbImage">
                                    <img class="upload-icon" src="{{ asset('global/materials/upload.svg') }}" alt="" />
                                    <span>{{ __('Upload Icon') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Category Name') }}</label>
                            <input
                                type="text"
                                class="box-input mb-0"
                                required=""
                                name="name"
                                id="name" />
                        </div>
                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Is Featured:') }}</label>
                            <div class="switch-field same-type">
                                <input type="radio" id="is-featured-edit-yes" name="is_featured" value="1" />
                                <label for="is-featured-edit-yes">{{ __('Yes') }}</label>
                                <input type="radio" id="is-featured-edit-no" name="is_featured" value="0" />
                                <label for="is-featured-edit-no">{{ __('No') }}</label>
                            </div>
                        </div>

                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Status:') }}</label>
                            <div class="switch-field same-type">
                                <input type="radio" id="status-edit-active" name="status" value="1" />
                                <label for="status-edit-active">{{ __('Active') }}</label>
                                <input type="radio" id="status-edit-deactivate" name="status" value="0" />
                                <label for="status-edit-deactivate">{{ __('Deactivate') }}</label>
                            </div>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                {{ __('Update Category') }}
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