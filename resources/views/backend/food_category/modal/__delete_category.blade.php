<!-- Delete Confirmation Modal -->
<div
        class="modal fade"
        id="deleteConfirmationModal"
        tabindex="-1"
        aria-labelledby="deleteConfirmationModalLabel"
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
                    <h3 class="title mb-4">{{ __('Delete Confirmation') }}</h3>
                    <p>{{ __('Are you sure you want to delete this category? This action cannot be undone.') }}</p>

                    <!-- Delete form (hidden) -->
                    <form id="deleteForm" method="post">
                        @csrf
                        @method('DELETE')
                    </form>

                    <div class="action-btns">
                        <button type="button" id="confirmDeleteBtn" class="site-btn-sm primary-btn me-2">
                            <i icon-name="check"></i>
                            {{ __('Delete') }}
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
                </div>
            </div>
        </div>
    </div>
</div>