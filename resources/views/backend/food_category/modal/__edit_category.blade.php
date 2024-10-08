<div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-labelledby="editCategoryModalLabel"
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
                    <h3 class="title mb-4">{{ __('Edit Category') }}</h3>
                    <form action="" id="editForm" method="post">
                        @csrf
                        @method('PUT')
                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Category Name') }}</label>
                            <input
                                type="text"
                                class="box-input mb-0"
                                required=""
                                name="name"
                                id="name"
                            />
                        </div>
                        <div class="site-input-groups">
                            <label class="box-input-label" for="">{{ __('Status') }}</label>
                            <select name="status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">De active</option>
                            </select>
                        </div>

                        <div class="action-btns">
                            <button type="submit" class="site-btn-sm primary-btn me-2">
                                <i icon-name="check"></i>
                                {{ __('update Category') }}
                            </button>
                            <a
                                href="#"
                                class="site-btn-sm red-btn"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            >
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
