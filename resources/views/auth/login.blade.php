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
                        <h3 class="mb-1 pt-2 self-text-black">Login</h3>
                        <p class="mb-4 text-muted">Enter your email below to login to your account.</p>

                        <div class="social-login d-flex justify-content-between gap-2">
                            <button class="btn self-bg-black self-text-white col-6"><i class="fa-brands fa-github"></i>
                                &nbsp;Github</button>
                            <button class="btn self-bg-black self-text-white col-6"><i class="fa-brands fa-google"></i>
                                &nbsp;Google</button>
                        </div>

                        <div class="divider my-3">
                            <div class="divider-text text-uppercase">Or continue with</div>
                        </div>


                        <form method="POST" action="{{ route('login') }}" class="mb-3" x-data="{ isVisible: false }">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="me@gmail.com" autofocus />
                                @error('email')
                                    <span class="text-danger">{{ $message ?? '' }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                @if (Route::has('password.request'))
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password *</label>
                                        <a href="{{ route('password.request') }}" class="self-text-black">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                @endif

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
                            {{-- <div class="mb-3">
                                <label for="defaultSelect" class="form-label">Select Role</label>
                                <select class="form-select" name="type">
                                  <option value="" selected>Select Role</option>
                                  @if(!empty(get_roles()))
                                    @foreach (get_roles() as $type => $role)
                                        <option value="{{$type}}">{{$role ?? ""}}</option>
                                    @endforeach
                                  @endif
                                </select>
                                @error('type') <span class="text-danger">{{ $message ?? '' }}</span> @enderror
                            </div> --}}
                            <div class="mb-3">
                                <button class="btn self-bg-black self-text-white d-grid w-100" type="submit">Sign
                                    in</button>
                            </div>
                        </form>


                        @if(false)
                            <p class="text-center">
                                <span>New on our platform?</span>
                                <a href="{{ route('register') }}" class="self-text-black fw-bold">
                                    <span>Create an account</span>
                                </a>
                            </p>
                        @endif
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
</x-guest-layout>
