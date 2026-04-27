<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @if (App::getLocale()=='ar')

    <link rel="stylesheet" href="{{ asset('build/auth/signin_ar.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('build/auth/signin.css') }}">
        
    @endif
          {{-- شريط اختيار اللغة --}}
    <!-- <div style="text-align: center; margin: 20px;">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a 
                rel="alternate" 
                hreflang="{{ $localeCode }}" 
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                style="margin: 0 10px; text-decoration: none; font-weight: bold;"
            >
                {{ $properties['native'] }}
            </a>
        @endforeach
    </div> -->
</head>
<body>
      
    <div class="login-container">


        <!-- Language Selector -->
        <div class="language-selector">
            <button class="language-btn" id="languageBtn">
                <i class="fas fa-globe"></i>
                <span>{{ LaravelLocalization::getCurrentLocaleName() }}</span>
                <i class="fas fa-chevron-down"></i>
            </button>

            <div class="language-dropdown" id="languageDropdown">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                    class="language-option @if(App::getLocale() == $localeCode) selected @endif"
                    data-lang="{{ $localeCode }}">
                        <i class="flag-icon fas fa-flag"></i>
                        <span>{{ $properties['native'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>


        <!-- Language Selector -->
        <!-- <div class="language-selector">
            <button class="language-btn" id="languageBtn">
                <i class="fas fa-globe"></i>
                <span>{{ LaravelLocalization::getCurrentLocaleName() }}</span>
                <i class="fas fa-chevron-down"></i>
            </button>

            <div class="language-dropdown" id="languageDropdown">
                @if (App::getLocale()=='ar')
                    <div class="language-option selected" data-lang="en">
                    <i class="flag-icon fas fa-flag-usa"></i>
                    <span>العربية (Arabic)</span>
                    
                </div>
                    
                @else
                    <div class="language-option selected" data-lang="en">
                    <i class="flag-icon fas fa-flag-usa"></i>
                    <span>English</span>
                    
                </div>
                    
                @endif
                 @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a rel="alternate" hreflang="{{ $localeCode }}"
               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
               class="language-option @if(App::getLocale() == $localeCode) selected @endif">
                <i class="flag-icon fas fa-flag"></i>
                <strong>{{ $properties['native'] }}</strong>
            </a>
           @endforeach 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                <div class="language-option" data-lang="es">
                    <i class="flag-icon fas fa-flag"></i>
                    <span>Español (Spanish)</span>
                </div>
                <div class="language-option" data-lang="fr">
                    <i class="flag-icon fas fa-flag"></i>
                    <span>Français (French)</span>
                </div>
                <div class="language-option" data-lang="de">
                    <i class="flag-icon fas fa-flag"></i>
                    <span>Deutsch (German)</span>
                </div>
                <div class="language-option" data-lang="zh">
                    <i class="flag-icon fas fa-flag"></i>
                    <span>中文 (Chinese)</span>
                </div>
            </div>
        </div> -->



  <div class="login-card">
            <div class="logo">
                <i class="fas fa-project-diagram"></i>
                <h1>{{trans('signin_trans.Project_Management')}}</h1>
                <p>{{trans('signin_trans.Sign_in_to_your_account')}}</p>
            </div>
            
            <!-- Role Selection Section -->
            <div class="role-selection" id="roleSelection">
                <div class="role-card" data-role="user">
                    <i class="fas fa-user"></i>
                    <h3>{{trans('signin_trans.User')}}</h3>
                    <p>{{trans('signin_trans.Project_team_member')}}</p>
                </div>
                
                <div class="role-card" data-role="admin">
                    <i class="fas fa-user-shield"></i>
                    <h3>{{trans('signin_trans.Admin')}}</h3>
                    <p>{{trans('signin_trans.System_administrator')}}</p>
                </div>
            </div>

            <!-- User Login Form -->
            <div class="login-form" id="userLoginForm">
                <div class="form-header">
                    <i class="fas fa-user"></i>
                    <h2>{{trans('signin_trans.User_Login')}}</h2>
                </div>
            <form method="POST" action="{{ route('login.user') }}">
                @csrf
                <div class="input-group">
                    <label for="email">{{trans('signin_trans.Email_Address')}}</label>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input id="email" placeholder="Enter your email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                    </div>
                </div>
                
                <div class="input-group">
                    <label for="password">{{trans('signin_trans.Password')}}</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" placeholder="Enter your password"  type="password" name="password" required autocomplete="current-password">
                    </div>
                </div>
                
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="remember">
                        <label for="remember">{{trans('signin_trans.Remember_me')}}</label>
                    </div>
                    <a href="#" class="forgot">{{trans('signin_trans.Forgot_password?')}}</a>
                </div>
                
                <button type="submit" class="login-btn">{{trans('signin_trans.Sign_In')}}</button>
            </form>


                
                <button class="back-btn" id="userBackBtn">
                    <i class="fas fa-arrow-left"></i> {{trans('signin_trans.Back_to_Role_Selection')}}
                </button>
            </div>
            
            <!-- Admin Login Form -->
            <div class="login-form" id="adminLoginForm">
                <div class="form-header">
                    <i class="fas fa-user-shield"></i>
                    <h2>{{trans('signin_trans.Admin_Login')}}</h2>
                </div>
                
            <form method="POST" action="{{ route('login.admin') }}">
                @csrf
                    <div class="input-group">
                        <label for="adminEmail">{{trans('signin_trans.Email_Address')}}</label>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="adminEmail" placeholder="admin@company.com" name="email" :value="old('email')" required autofocus autocomplete="username">
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <label for="adminPassword">{{ trans('signin_trans.Password') }}</label>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="adminPassword" placeholder="Enter admin password"  name="password" required autocomplete="current-password">
                        </div>
                    </div>
                    
                    <div class="remember-forgot">
                        <div class="remember">
                            <input type="checkbox" id="adminRemember">
                            <label for="adminRemember">{{trans('signin_trans.Remember_me')}}</label>
                        </div>
                        <a href="#" class="forgot">{{trans('signin_trans.Forgot_password?')}}</a>
                    </div>
                    
                    <button type="submit" class="login-btn">{{trans('signin_trans.Sign_In')}}</button>
                </form>
                
                <button class="back-btn" id="adminBackBtn">
                    <i class="fas fa-arrow-left"></i> {{trans('signin_trans.Back_to_Role_Selection')}}
                </button>
            </div>
            
            <div class="divider">
                <div class="line"></div>
                <span>{{trans('signin_trans.Or_continue_with')}}</span>
                <div class="line"></div>
            </div>
            
            <div class="social-login">
                <div class="social-btn fb">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="social-btn google">
                    <i class="fab fa-google"></i>
                </div>
                <div class="social-btn github">
                    <i class="fab fa-github"></i>
                </div>
            </div>
            
            <p class="signup-link">
                {{trans('signin_trans.Don\'t_have_an_account?')}}<a href="#">{{trans('signin_trans.Sign_up')}}</a>
            </p>
        </div>
    </div>
    
    <div class="notification" id="notification">
        <i class="fas fa-check-circle" style="color: #0d652d; margin-right: 10px;"></i>
        <span id="notificationText">Login successful!</span>
    </div>
    
    <div class="footer">
        &copy;{{trans('signin_trans.2025_Project_Management._All_rights_reserved.')}}
    </div>

    <script src="{{ asset('build/auth/signin.js') }}"></script>
  
</body>
</html>