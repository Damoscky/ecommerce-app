
<form id="RegisterForm" method="POST" action="{{ route('auth.register') }}" class="nt_mini_cart flex column h__100">
    @csrf
    <div class="mini_cart_header flex fl_between al_center">
        <div class="h3 widget-title tu fs__16 mg__0">Register</div>
        <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
    </div>
    <div class="mini_cart_wrap">
        <div class="mini_cart_content fixcl-scroll">
            <div class="fixcl-scroll-content">
                <p class="form-row">
                    <label for="-FirstName">First Name</label>
                    <input type="text" name="firstname" class="form-control @error('name') is-invalid @enderror" id="-FirstName" autocomplete="given-name">
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>
                <p class="form-row">
                    <label for="-LastName">Last Name</label>
                    <input type="text" name="lastname" id="-LastName" autocomplete="family-name">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>
                <p class="form-row">
                    <label for="-PhoneNo">Phone No</label>
                    <input type="text" name="phoneno" id="-PhoneNo" autocomplete="family-name">
                    @error('phoneno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>
                <p class="form-row">
                    <label for="-email">Email <span class="required">*</span></label>
                    <input type="email" name="email" id="-email" class="" autocapitalize="off" autocomplete="email" aria-required="true">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>
                <p class="form-row">
                    <label for="-password">Password <span class="required">*</span></label>
                    <input type="password" name="password" id="-password" class="" autocomplete="current-password" aria-required="true">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>

                <p class="form-row">
                    <label for="-password">Confirm Password <span class="required">*</span></label>
                    <input type="password" name="confirmPassword" id="-password" class="" autocomplete="current-password" aria-required="true">
                    @error('confirmPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>
                <button type="submit" class="button button_primary w__100 tu js_add_ld">
                    {{ __('Register') }}
                </button>
                <br>
                <p class="mb__10 mt__20">Already have an account?
                    <a href="#" data-id="#customer_login" class="link_acc">Login here</a>
                </p>
            </div>
        </div>
    </div>
</form>
