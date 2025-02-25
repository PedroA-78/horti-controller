<!DOCTYPE html>
<html lang="pt-BR">
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
        <?= $notify ? "<div class='notify $notify[color]'><span class='material-icons'>$notify[icon]</span><p>$notify[message]</p></div>" : '' ?>
        <div class="register_container">
            <div class="logo">
                <span class="material-symbols-outlined">package_2</span>
                <h2>lightinv</h2>
            </div>
            <div class="register">
                <h2>Login</h2>
                <form action="/login" method="POST">
                    <div class="user_email">
                        <input type="email" name="user_email" placeholder="Email">
                        <span class="material-icons">email</span>
                    </div>
                    
                    <div class="user_password">
                        <input type="text" name="user_password" placeholder="Password">
                        <span class="material-icons">lock</span>
                    </div>

                    <button type="submit">Login</button>
                </form>

                <div class="question">
                    <p>Don't have an account? <a href="/register">Register!</a></p>
                </div>

            </div>
        </div>
    </main>
</body>
</html>