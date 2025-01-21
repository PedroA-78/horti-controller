<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="views/styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,100,0,0&icon_names=package_2" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <main class="page_register">
        <div class="register_container">
            <div class="logo">
                <span class="material-symbols-outlined">package_2</span>
                <h2>lightinv</h2>
            </div>
            <div class="register">
                <h2>Register</h2>
                <!-- <p>Join <span>lighinv</span> for exclusive access</p> -->
                <form action="">
                    <div class="user_name">
                        <input type="text" placeholder="Username">
                        <span class="material-icons">person</span>
                    </div>

                    <div class="user_email">
                        <input type="email" name="" id="" placeholder="Email">
                        <span class="material-icons">email</span>
                    </div>
                    
                    <div class="user_password">
                        <input type="text" placeholder="Password">
                        <span class="material-icons">lock</span>
                    </div>

                    <button type="button">Register</button>
                </form>

                <div class="question">
                    <p>Do you have an account? <a href="/login">Login!</a></p>
                </div>

            </div>
        </div>
    </main>
</body>
</html>