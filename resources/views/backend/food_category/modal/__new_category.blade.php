<div
    class="modal fade"
    id="addNewCategory"
    tabindex="-1"
    aria-labelledby="addNewCategoryModalLabel"
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
                    <h3 class="title mb-4">{{ __('Add New Category') }}</h3>
                    <form action="{{route('admin.food-category.store')}}" method="post">
                        @csrf
                        <div class="site-input-groups">
                            <label for="" class="box-input-label">{{ __('Category Name') }}</label>
                            <input
                                type="text"
                                name="name"
                                class="box-input mb-0"
                                placeholder=""
                                required=""
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
                                {{ __('Add Category') }}
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
