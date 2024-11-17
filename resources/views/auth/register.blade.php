<x-guest-layout>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner_ py-4">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        {{-- <div class="app-brand justify-content-center mb-4 mt-2">

                        </div> --}}
                        <!-- /Logo -->
                        <h3 class="mb-1 pt-2 self-text-black">Create an account</h3>
                        <p class="mb-3 text-muted">Enter your email below to create your account.</p>

                        <div class="social-login d-flex justify-content-between gap-2">
                            <button class="btn self-bg-black self-text-white col-6"><i class="fa-brands fa-github"></i>
                                &nbsp;Github</button>
                            <button class="btn self-bg-black self-text-white col-6"><i class="fa-brands fa-google"></i>
                                &nbsp;Google</button>
                        </div>

                        <div class="divider my-3">
                            <div class="divider-text text-uppercase">Or continue with</div>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="mb-2" x-data="{ isVisible: false }">
                            @csrf
                            <div class="mb-2">
                                <label for="email" class="form-label">Name *</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="jhon" autofocus />
                                @error('name')
                                    <span class="text-danger">{{ $message ?? '' }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email *</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="me@gmail.com" autofocus />
                                @error('email')
                                    <span class="text-danger">{{ $message ?? '' }}</span>
                                @enderror
                            </div>
                            <div class="mb-2 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password *</label>
                                </div>

                                <div class="input-group input-group-merge">
                                    <!-- Fix for password visibility toggle -->
                                    <input :type="isVisible ? 'text' : 'password'" id="password" class="form-control"
                                        name="password" placeholder="password" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer" @click="isVisible = !isVisible">
                                        <i class="ti" :class="isVisible ? 'ti-eye' : 'ti-eye-off'"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message ?? '' }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Confirm Password *</label>
                                </div>

                                <div class="input-group input-group-merge">
                                    <!-- Fix for password visibility toggle -->
                                    <input :type="isVisible ? 'text' : 'password'" id="password" class="form-control"
                                    name="password_confirmation" placeholder="Confirm Password" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer" @click="isVisible = !isVisible">
                                        <i class="ti" :class="isVisible ? 'ti-eye' : 'ti-eye-off'"></i>
                                    </span>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message ?? '' }}</span>
                                @enderror
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />

                                            <div class="ms-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                        __('Terms of Service') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                        __('Privacy Policy') .
                                                        '</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif

                            <div class="mb-2">
                                <button class="btn self-bg-black self-text-white d-grid w-100" type="submit">Sign up</button>
                            </div>
                        </form>



                        <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="{{ route('login') }}" class="self-text-black fw-bold">
                                <span>{{ __('Already registered?') }}</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
</x-guest-layout>
