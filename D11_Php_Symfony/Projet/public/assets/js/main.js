document.querySelectorAll('button[aria-label="Close"]').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        e.target.closest('div[role="alert"]').classList.add('hide-toast');
    });
});

document.querySelectorAll('div[role="alert"]').forEach(toast => {
    toast.addEventListener('animationend', (e) => {
        e.preventDefault();
        e.target.remove();
    });
});