<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_dashboard">
        <div class="user_welcome">
            <h2>Bem-vindo, <?= $user ?>!</h2>
        </div>
        <div class="dashboard_actions">
            <button type="button" class="dashboard_newcount">Nova contagem</button>
        </div>
        <div class="dashboard_modals">
            <div class="dashboard_newcount_modal">
                <form action="/dashboard" method="POST">
                    <h2>Nova contagem</h2>
                    
                    <div class="dashboard_newcount_icon">
                        <span class="material-symbols-outlined">box</span>
                    </div>
                    
                    <p>Para confirmar, digite <span>"nova contagem"</span> no campo abaixo</p>
                    
                    <input type="text" name="confirm">
                    
                    <div class="dashboard_newcount_buttons">
                        <button type="button" class="dashboard_newcount_cancel">Cancel</button>
                        <button type="submit" class="dashboard_newcount_confirm">Confirm</button>
                    </div>
    
                    <input type="hidden" name="action" value="newcount">
                </form>
            </div>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>