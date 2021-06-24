<div id="nt_login_canvas" class="nt_fk_canvas dn lazyload">
    <form id="customer_login" method="POST" action="{{ route('auth.login') }}" class="nt_mini_cart flex column h__100 is_selected">
        @csrf
    <div class="mini_cart_header flex fl_between al_center">
        <div class="h3 widget-title tu fs__16 mg__0">Login</div>
        <i class="close_pp pegk pe-7s-close ts__03 cd"></i></div>
    <div class="mini_cart_wrap">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mini_cart_content fixcl-scroll">
            <div class="fixcl-scroll-content"><p class="form-row">
                <label for="CustomerEmail">Email <span class="required">*</span></label>
                <input type="email" name="email" id="CustomerEmail" autocomplete="email" autocapitalize="off">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>
                <p class="form-row">
                    <label for="CustomerPassword">Password <span class="required">*</span></label>
                    <input type="password" value="" name="password" autocomplete="current-password" id="CustomerPassword">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="button button_primary w__100 tu js_add_ld">
                    {{ __('Sign In') }}
                </button>
                <br>
                <p class="mb__10 mt__20">New customer?
                    <a href="#" data-id="#RegisterForm" class="link_acc">Create your account</a>
                </p>
                <p>Lost password?
                    <a href="#" data-id="#RecoverForm" class="link_acc">Recover password</a>
                </p>
            </div>
        </div>
    </div>
</form>
