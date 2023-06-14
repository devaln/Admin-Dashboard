<div class="card-header">
    <h4>Delete Account</h4>
    <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
    <div class="form-group-btn">
        <button id="delete-user" class="btn btn-mat waves-effect waves-light btn-danger">Delete Account</button>
    </div>
</div>


<div id="modal-user-delete" class="card-body" style="display: none">

    <div class="confirm-user-deletion" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="md-float-material form-material">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="p-2 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            {{-- Email --}}
            <div class="pass col-lg-4">
                <div class="form-group form-primary">
                    <input type="password" name="password" class="form-control" required autofocus>
                    <span class="form-bar"></span>
                    <label class="float-label">password</label>
                    {!! $errors->first(
                        'password',
                        '<span class="alert-msg text-danger" aria-hidden="true"><i class="ti-info-alt" aria-hidden="true">
                        </i> :message</span>',
                    ) !!}
                </div>
            </div>

            <div class="form-group-btn">
                <button id="modal-close" type="button" class="btn btn-mat waves-effect waves-light btn-inverse">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="btn btn-mat waves-effect waves-light btn-danger">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </div>
</div>
