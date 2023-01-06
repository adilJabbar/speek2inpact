


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
    
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/fonts/web-icons/web-icons.min599c.css?v4.0.2') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/toastr/toastr.min599c.css?v4.0.2') }}">
    
    <title>Document</title>
    <!-- css link  -->
    <link rel="stylesheet" href="{{url('css/')}}/signup.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header">
                <div class="logo"><h1>Speak2Impact Academy</h1></div>
                <div class="login-action">
                    <a href="{{route('login')}}""><button class="start-learning">Login</button></a>
                </div>
            </div>

        </div>
    </header>
    <div class="signup-area">
            <h1>Sign up</h1>
            <span>Get started by filling up details below</span>
            <div class="signup-option">
                <button><img src="{{url('images/')}}/google.svg" alt=""> Log in with Google</button>
                <button><img src="{{url('images/')}}/fb.svg" alt=""> Log in with Facebook</button>
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
            <div class="signup-field">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control f-img" name="first_name" value="@if(!empty($name)){{ $name }}@else{{ old('name') }}@endif" required="required" placeholder="Enter First name">
            @if ($errors->has('first_name'))
                                        <label class="error" for="first_name">{{ $errors->first('first_name') }}</label>
                                        @endif
            <img src="{{url('images/')}}/person.svg" alt="">
             </div>
             <div class="signup-field">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control f-img" name="last_name" required="required" placeholder="Enter last name">
                @if ($errors->has('last_name'))
                <label class="error" for="last_name">{{ $errors->first('last_name') }}</label>
                @endif
                <img src="{{url('images/')}}/person.svg" alt="">
                 </div>
                 <div class="signup-field">
                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control f-img" name="phone_number" required="required" placeholder="Enter phone number">
                    <img src="{{url('images/')}}/call.svg" alt="">
                     </div>
                 <div class="signup-field">
                    <label for="exampleInputEmail1" class="form-label">Email id</label>
                    <input type="email" class="form-control" name="email" value="@if(!empty($name)){{ $email }}@else{{ old('email') }}@endif" required="required" placeholder="Enter email id">
                    @if ($errors->has('email'))
                    <label class="error" for="email">{{ $errors->first('email') }}</label>
                    @endif
                    <img src="{{url('images/')}}//mail.svg" alt="">
                     </div>
             <div class="signup-field">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" required="required" placeholder="Enter password">
                 </div>
                 <div class="signup-field">
                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required="required" placeholder="Confirm Password">
                     </div>
                     <div class="signup-field">
                        <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" class="form-control f-img" name="city" placeholder="City">
                        <img src="{{url('images/')}}/location_on.svg" alt="">
                         </div>
            <button type="submit" class="signup-m">Register</button>
          </form>
    </div>


    <footer>
        <div class="container">
         <div class="footer">
             <div class="footer-top">
             <div class="footer-logo"><span>Speak2Impact Academy</span></div>
             <div class="footer-link">
                 <a href="#">Contact US</a>
                 <a href="#">Speak2impact</a>
                 <a href="#">Sign up</a>
                 <a href="#">Login</a>
             </div>
         </div>
         <div class="social-icon">
             <a href="#"><img src="{{url('images/')}}/icons8-instagram.svg" alt=""></a>
             <a href="#"><img src="{{url('images/')}}/icons8-facebook.svg" alt=""></a>
         </div>
         </div>
        </div>
     </footer>
 </body>
 </html>
 <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
 <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('frontend/js/fancybox.min.js') }}"></script>
 <script src="{{ asset('frontend/js/modernizr.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery.validate.js') }}"></script>
 
 <!-- Toastr -->
 <script src="{{ asset('backend/vendor/toastr/toastr.min599c.js?v4.0.2') }}"></script>
 @section('javascript')
 <script>
    $(window).on("load", function (e){
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function()
        {   
            /* Delete record */
            $('.delete-record').click(function(event)
            {
                var url = $(this).attr('href');
                event.preventDefault();
                
                if(confirm('Are you sure want to delete this record?'))
                {
                    window.location.href = url;
                } else {
                    return false;
                }

            });

            /* Toastr messages */
            toastr.options.closeButton = true;
            toastr.options.timeOut = 5000;
            @if(session()->has('success'))
                toastr.success("{{ session('success') }}");
            @endif
            @if(session()->has('status'))
                toastr.success("{{ session('status') }}");
            @endif
            @if(session()->has('error'))
                toastr.error("{{ session('error') }}");
            @endif
            @if(session()->has('info'))
                toastr.info("{{ session('info') }}");
            @endif

            $('.mobile-nav').click(function()
            {
                $('#sidebar').toggleClass('active');
                
                $(this).toggleClass('fa-bars');
                $(this).toggleClass('fa-times');
            });

            $("#becomeInstructorForm").validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    contact_email:{
                        required: true,
                        email:true
                    },
                    telephone: {
                        required: true
                    },
                    paypal_id:{
                        required: true,
                        email:true
                    },
                    biography: {
                        required: true
                    },
                },
                messages: {
                    first_name: {
                        required: 'The first name field is required.'
                    },
                    last_name: {
                        required: 'The last name field is required.'
                    },
                    contact_email: {
                        required: 'The contact email field is required.',
                        email: 'The contact email must be a valid email address.'
                    },
                    telephone: {
                        required: 'The telephone field is required.'
                    },
                    paypal_id: {
                        required: 'The paypal id field is required.',
                        email: 'The paypal id must be a valid email address.'
                    },
                    biography: {
                        required: 'The biography field is required.'
                    },
                }
            });
        });
    </script>
<script type="text/javascript">
$(document).ready(function()
{
    $("#registerForm").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email:{
                    required: true,
                    email:true,
                    remote: "{{ url('checkUserEmailExists') }}"
                },
                password:{
                    required: true,
                    minlength: 6
                },
                password_confirmation:{
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                first_name: {
                    required: 'The fname field is required.'
                },
                last_name: {
                    required: 'The lname field is required.'
                },
                email: {
                    required: 'The email field is required.',
                    email: 'The email must be a valid email address.',
                    remote: 'The email has already been taken.'
                },
                password: {
                    required: 'The password field is required.',
                    minlength: 'The password must be at least 6 characters.'
                },
                password_confirmation: {
                    required: 'The password confirmation field is required.',
                    equalTo: 'The password confirmation does not match.'
                }
            }
        });

});
</script>
