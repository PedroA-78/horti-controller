document.addEventListener('DOMContentLoaded', () => {
    const noBackups = document.querySelector('.no_backups');
    if (noBackups) document.querySelector('.backups_container form').style.display = 'none';
})

const print = console.log