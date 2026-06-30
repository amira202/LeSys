const nav = document.querySelectorAll('.industry-sticky-nav a');

if (nav.length) {
    nav.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
}



const sections = document.querySelectorAll(
  '#overview, #how-we-help, #key-outcomes, #impact, #why-lesys, #lesys-advantage, #related'
);

const navLinks = document.querySelectorAll('.industry-sticky-nav a');

let current = '';

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            current = entry.target.id;

            navLinks.forEach(link => {
                link.classList.toggle(
                    'active',
                    link.getAttribute('href') === '#' + current
                );
            });
        }
    });
}, {
    root: null,
    threshold: [0.2, 0.5, 0.7]
});

sections.forEach(section => observer.observe(section));
