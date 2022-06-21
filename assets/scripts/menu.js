function menu() {
    const bar = document.getElementById('bar');
    const nav = document.getElementById('navbar');


    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active');
        })
    }

    if (nav) {
        nav.addEventListener('click', () => {
            nav.classList.remove('active');
        })
    }
}

