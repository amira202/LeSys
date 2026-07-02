window.addEventListener('load', () => {
    const navLinks = document.querySelectorAll('.industry-sticky-nav a');
    const menu = document.querySelector('.industry-sticky-nav');
    
    const menuSectionIds = ['overview', 'how-we-help', 'key-outcomes', 'impact', 'why-lesys','lesys-advantage','related'];
    const boundaryIds = ['startnav', 'contact']; 
    
    // We use a lower threshold to ensure it triggers even for shorter sections at the bottom
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.id;

                // 1. Visibility Logic
                if (boundaryIds.includes(id)) {
                    menu.classList.add('hidden');
                } else {
                    menu.classList.remove('hidden');
                }

                // 2. Active Logic
                if (menuSectionIds.includes(id)) {
                    navLinks.forEach(link => {
                        // Highlight the link only if it matches current section
                        link.classList.toggle('active', link.getAttribute('href') === '#' + id);
                    });
                }
            }
        });
    }, { 
        // 0.1 is more forgiving for bottom-of-page sections
        threshold: 0.1, 
        rootMargin: '-10% 0px -40% 0px' 
    });

    [...menuSectionIds, ...boundaryIds].forEach(id => {
        const el = document.getElementById(id);
        if (el) observer.observe(el);
    });
});