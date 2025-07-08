<section class="profile-info-section">
    <header>
        <h2 class="form-title">{{ __('Profile Information') }}</h2>
        <p class="form-description">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="form-container">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input
                id="name"
                name="name"
                type="text"
                class="form-input"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >
            @if ($errors->has('name'))
                <div class="form-error">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input
                id="email"
                name="email"
                type="email"
                class="form-input"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >
            @if ($errors->has('email'))
                <div class="form-error">{{ $errors->first('email') }}</div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="email-verification-notice">
                    <p class="verify-info">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="verify-resend-button">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="verify-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="primary-button">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p class="form-success-message">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
