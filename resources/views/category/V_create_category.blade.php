<div class="modal fade" tabindex="-1" role="dialog" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('category.create_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createForm" method="POST" action="">
                @csrf
                <div class="modal-body">
                    <x-input type="text" name="category_name" label="{{ __('category.category_name') }}" :value="old('category_name')" placeholder="{{ __('category.enter_category_name') }}" />
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary btn-loading" data-loading-text="{{ __('app.loading') }}">{{ __('app.save') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('app.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
