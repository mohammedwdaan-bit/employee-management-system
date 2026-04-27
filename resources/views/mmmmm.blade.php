<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo">
                <i class="fas fa-project-diagram"></i>
                <h1>Project Management</h1>
                <p>Sign in to your account</p>
            </div>
            
            <form id="loginForm">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" placeholder="Enter your email" required>
                    </div>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder="Enter your password" required>
                    </div>
                </div>
                
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot">Forgot password?</a>
                </div>
                
                <button type="submit" class="login-btn">Sign In</button>
            </form>
            
            <div class="divider">
                <div class="line"></div>
                <span>Or continue with</span>
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
                Don't have an account? <a href="#">Sign up</a>
            </p>
        </div>
    </div>
    
    <div class="notification" id="notification">
        <i class="fas fa-check-circle" style="color: #0d652d; margin-right: 10px;"></i>
        <span id="notificationText">Login successful!</span>
    </div>
    
    <div class="footer">
        &copy; 2023 Project Management. All rights reserved.
    </div>
    
</body>
</html>