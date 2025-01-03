<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f4f4;
        }

        .container {
            display: flex;
            width: 900px;
            height: 600px;
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
            /* وضع التكست فالمنتصف */
            align-items: center;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .left-section .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: white;
            border: none;
            color: #10bc69;
            padding: 0;
            font-size: 20px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .left-section .back-btn:hover {
            background: #10bc69;
            color: white;
        }

        .left-section h2 {
            font-size: 24px;
            margin-bottom: 30px;
            color: white;
        }

        .left-section button {
            background: none;
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            margin-bottom: 10px;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s;
            width: 150px;
            text-align: center;
        }

        .left-section button.active {
            background: white;
            color: #10bc69;
        }

        .left-section button:hover {
            background: white;
            color: #10bc69;
        }

        /* Right Section */
        .right-section {
            flex: 2;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            overflow-y: auto;
        }

        .right-section h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .right-section .form-group {
            margin-bottom: 15px;
        }

        .right-section label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        /* تعديل الحقول النصية */
.right-section input,
.right-section select,
.right-section textarea {
    width: calc(100% - 40px); /* جعل الحقل أصغر قليلًا مع وجود هوامش */
    margin: 8px 20px; /* مسافة من الجوانب */
    padding: 10px; /* زيادة التباعد داخل الحقول */
    border: 1px solid #ddd; /* حدود الحقول */
    border-radius: 5px; /* زوايا الحقول دائرية */
    font-size: 14px; /* حجم الخط داخل الحقول */
    font-family: Arial, sans-serif;
    box-sizing: border-box; /* منع التأثير على الحقول */
}

/* تعديل النصوص */
.right-section label {
    font-size: 16px; /* زيادة حجم النص */
    color: #333; /* لون النص */
    margin-left: 20px; /* مسافة بين النص والحقل */
    display: block;
}

/* المسافة بين الحقول */
.form-group {
    margin-bottom: 10px; /* زيادة المسافة بين الحقول */
}

/* تعديل زر التسجيل */
.right-section button.submit-btn {
    width: calc(100% - 40px);
    margin: 10px 20px;
    padding: 10px;
    font-size: 13px;
    border-radius: 8px;
    cursor: pointer;
}

.right-section button.submit-btn {
    width: 100%; /* عرض الزر كامل */
    padding: 12px; /* تباعد داخلي */
    background: #10bc69; /* لون الخلفية */
    color: white; /* لون النص */
    border: none; /* إزالة الحدود */
    border-radius: 5px; /* زوايا مستديرة */
    cursor: pointer; /* شكل المؤشر */
    font-size: 16px; /* حجم الخط */
    margin-top: 20px; /* مسافة من الحقول أعلاه */
    transition: background 0.3s ease; /* تأثير عند التمرير */
}

.right-section button.submit-btn:hover {
    background: #097943; /* تغيير اللون عند التمرير */
}

    </style>
</head>

<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <button class="back-btn" onclick="window.location.href='/'">←</button>
            <h2>Choose Your Role</h2>
            <button id="clientBtn" class="active" onclick="showForm('client')">Client</button>
            <button id="engineerBtn" onclick="showForm('engineer')">Engineer</button>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <h2 id="formTitle">Client Sign Up</h2>

            <!-- Client Form -->
            <form id="clientForm" action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="text" hidden value="client" name="role" id="role">
                <div class="form-group">
                    <label for="clientName">Name</label>
                    <input type="text" id="clientName" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="clientEmail">Email</label>
                    <input type="email" id="clientEmail" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="clientPassword">Password</label>
                    <input type="password" id="clientPassword" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="clientPhone">Phone Number</label>
                    <input type="text" id="clientPhone" name="phone" placeholder="Enter your phone number">
                </div>
                <button type="submit" class="submit-btn">Sign Up</button>
                <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #555;">
                    Already have an account? <a href="/login" style="color: #667eea; text-decoration: none;">Login</a>
                </p>
            </form>

            <!-- Engineer Form -->
            <form id="engineerForm" action="{{ route('engineers.store') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                @csrf
                <div class="form-group">
                    <label for="engineerName">Name</label>
                    <input type="text" id="engineerName" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="engineerEmail">Email</label>
                    <input type="email" id="engineerEmail" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="engineerPassword">Password</label>
                    <input type="password" id="engineerPassword" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="engineerCity">City</label>
                    <select id="engineerCity" name="city" required>
                        <option value="">Choose Your City</option>
                        <option value="Benghazi">Benghazi</option>
                        <option value="Tripoli">Tripoli</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="field">Choose the Field</label>
                    <select id="field" name="field" required>
                        <option value="">Choose the Field</option>
                        <option value="Interior Designer">Interior Designer</option>
                        <option value="Civil Engineer">Civil Engineer</option>
                        <option value="Mechanical Engineer">Mechanical Engineer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="about">Write about yourself</label>
                    <textarea id="about" name="about" rows="4" placeholder="Tell us about yourself"></textarea>
                </div>
                <div class="form-group">
                    <label for="images">Upload Pictures</label>
                    <input type="file" id="images" name="Upload Pictures" multiple>
                </div>
                <div class="form-group">
                    <label for="photo">Personal Photo</label>
                    <input type="file" id="photo" name="Personal Photo">
                </div>
                <button type="submit" class="submit-btn">Sign Up</button>
                <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #555;">
                    Already have an account? <a href="/login" style="color: #10bc69; text-decoration: none;">Login</a>
                </p>
                
            </form>
        </div>
    </div>

    <script>
        
        function showForm(role) {
            const clientForm = document.getElementById('clientForm');
            const engineerForm = document.getElementById('engineerForm');
            const formTitle = document.getElementById('formTitle');
            const clientBtn = document.getElementById('clientBtn');
            const engineerBtn = document.getElementById('engineerBtn');

            if (role === 'client') {
                clientForm.style.display = 'block';
                engineerForm.style.display = 'none';
                formTitle.textContent = 'Client Sign Up';
                clientBtn.classList.add('active');
                engineerBtn.classList.remove('active');
            } else {
                clientForm.style.display = 'none';
                engineerForm.style.display = 'block';
                formTitle.textContent = 'Engineer Sign Up';
                clientBtn.classList.remove('active');
                engineerBtn.classList.add('active');
            }
        }

        // إظهار النموذج الافتراضي عند التحميل
        showForm('client');
    </script>
    <script>
        // JavaScript to handle button click and set the input value
        document.getElementById('clientBtn').addEventListener('click', function () {
            const input = document.getElementById('role'); 
            input.value = 'client'; // Set your desired value here
        });
    </script>
    <script>
        // JavaScript to handle button click and set the input value
        document.getElementById('engineerBtn').addEventListener('click', function () {
            const input = document.getElementById('role');
            input.value = 'engineer'; // Set your desired value here
        });
    </script>
</body>
</html>