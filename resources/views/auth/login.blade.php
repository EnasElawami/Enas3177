
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }

        .container {
            display: flex;
            width: 900px;
            height: 500px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Left Section */
        .left-section {
            flex: 1;
            background: linear-gradient(135deg, #10bc69, #097943);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
            position: relative;
        }

        .left-section h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .left-section p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 300px;
        }

        /* Back Button */
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            background: #ffffff;
            color: #10bc69;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.3s;
        }

        .back-btn:hover {
            background: #e0e0e0;
        }

        /* Right Section */
        .right-section {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-section h2 {
            font-size: 28px;
            margin-bottom: 5px;
            color: #333;
        }

        .right-section p {
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #10bc69;
        }

        .submit-btn {
            width: 100%;
            max-width: 400px;
            margin: 10px auto;
            padding: 12px;
            background: #10bc69;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #097943;
        }

        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .footer a {
            color: #10bc69;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <button class="back-btn" onclick="window.location.href='/'">←</button>
            <h1>Welcome back to your account</h1>
            <p>Discover a wide range of courses and connect with world-class instructors to enhance your knowledge and skills.</p>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <h2>Login</h2>
            <p>                                        </p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            {{-- <form action="/login" method="POST"> --}}
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <div class="footer">
                <p>Don’t have an account? <a href="/register">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>
