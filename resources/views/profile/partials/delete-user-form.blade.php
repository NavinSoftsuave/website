<section class="delete-account-section">
    <header>
        <h2 class="delete-title">
            {{ __('Delete Account') }}
        </h2>

        <p class="delete-description">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="danger-button" onclick="document.getElementById('confirm-user-deletion').style.display = 'flex';">
        {{ __('Delete Account') }}
    </button>

    {{-- Modal --}}
    <div id="confirm-user-deletion" class="custom-modal" style="display: {{ $errors->userDeletion->isNotEmpty() ? 'flex' : 'none' }};">
        <div class="modal-content">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 class="modal-title">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="modal-description">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="{{ __('Password') }}"
                        required
                    >
                    @if ($errors->userDeletion->has('password'))
                        <div class="form-error">
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="button" class="secondary-button" onclick="document.getElementById('confirm-user-deletion').style.display = 'none';">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="danger-button">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
