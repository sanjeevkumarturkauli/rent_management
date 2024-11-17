<x-guest-layout>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner_ py-4" style="max-width: 400px; width: 100%;">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        {{-- <div class="app-brand justify-content-center mb-4 mt-2"></div> --}}
                        <!-- /Logo -->
                        <h4 class="mb-1 pt-2 self-text-black">Forgot Password?</h4>
                        <p class="mb-4 text-muted">Enter your email and we'll send you instructions to reset your
                            password</p>
                        <form class="mb-3"method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control" name="email"
                                    placeholder="Enter your email" autofocus />
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                            <button class="btn self-bg-black self-text-white d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('login') }}"
                                class="d-flex align-items-center justify-content-center self-text-black">
                                <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                                Back to login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
    <!-- / Content -->
</x-guest-layout>
