const cards = document.querySelectorAll('.book-card');

cards.forEach(card => {
    const buttons = card.querySelector('.book-buttons');

    card.addEventListener('mouseenter', () => {
        cards.forEach(c => c.classList.remove('show-buttons'));
        card.classList.add('show-buttons');
    });

    buttons.addEventListener('mouseenter', () => {
        card.classList.add('show-buttons');
    });

    card.addEventListener('mouseleave', (e) => {
        const related = e.relatedTarget;
        if (!buttons.contains(related)) {
            card.classList.remove('show-buttons');
        }
    });

    buttons.addEventListener('mouseleave', (e) => {
        const related = e.relatedTarget;
        if (!card.contains(related)) {
            card.classList.remove('show-buttons');
        }
    });
});
