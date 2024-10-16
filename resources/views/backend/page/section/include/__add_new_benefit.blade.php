<div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        aria-labelledby="addNewBenefitModalLabel"
        aria-hidden="true"
>
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content site-table-modal">
            <div class="modal-body popup-body">
                <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                ></button>
                <div class="popup-body-text">
                    <h3 class="title mb-4">{{ __('Add New') }}</h3>
                    <form action="{{ route('admin.page.content-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="benefits">

                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Picture:') }}</label>
                            <div class="wrap-custom-file">
                                <input type="file" name="icon" id="icon" accept=".gif, .jpg, .png"/>
                                <label for="icon">
                                    <img class="upload-icon" src="{{ asset('global/materials/upload.svg') }}" alt=""/>
                                    <span>{{ __('Upload Icon') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <code >Image Should be square</code>
                            </div>
                        </div>
                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Name:') }}</label>
                            <input type="text" name="title" class="box-input mb-0" placeholder="Register" required=""/>
                        </div>
                        <div class="site-input-groups mb-0">
                            <label for="" class="box-input-label">{{ __('Message:') }}</label>
                            <textarea name="description" class="form-textarea" placeholder="Description"></textarea>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                {{ __('Add New') }}
                            </button>
                            <a
                                    href="#"
                                    class="site-btn-sm red-btn"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                            >
                                <i icon-name="x"></i>
                                {{ __('Close') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
