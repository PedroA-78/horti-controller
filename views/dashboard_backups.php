<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../views/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <script src="/views/script/backup.js"></script>
</head>
<body>
    <?php include_once 'includes/header.php' ?>

    <main class="page_backups">
        <div class="backups_container">
            <h2>Backups <?= $sector ?>!</h2>
            <?= !$backups ? '<div class="no_backups"><p>Ainda não existem backups do setor!</p></div>' : ''; ?>
            <form action="/dashboard/backups" id="backupForm" method="POST">
                <div class="backups">
                    <?php foreach($backups as $backup): ?>
                    <div class="backup">
                        <input type="radio" name="backup" id="<?= $backup['id'] ?>" value="<?= $backup['id'] ?>" required>
                        <label for="<?= $backup['id'] ?>"><?= $backup['date'] ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>

                <input type="hidden" name="action" value="restore">

                <div class="backups_actions">
                    <!-- <button type="submit" class="export">Export</button> -->
                    <button type="submit" class="restore">Restore</button>
                </div>
            </form>
        </div>
    </main>

    <?php include_once 'includes/footer.php' ?>
</body>
</html>