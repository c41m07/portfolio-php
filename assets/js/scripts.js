//Fonction qui affiche une citation aléatoire dans le footerancrage
function randomQuote()
{
    const quotes = [
        "Le code, c'est comme l'humour. Quand vous devez l'expliquer, c'est mauvais.",
        "Parler ne coûte rien. Montrez-moi le code. – Linus Torvalds",
        "D'abord, résolvez le problème. Ensuite, écrivez le code.",
        "Corrigez la cause, pas le symptôme.",
        "L'expérience est le nom que tout le monde donne à ses erreurs.",
        "En cas d'incendie : git commit, git push, quittez le bâtiment.",
        "RTFM",
        "La seule constante en programmation, c’est le changement.",
        "La caféine est un langage de programmation universel.",
        "Si ça marche, ne touche à rien. (Sauf si t’es stagiaire.)",
        "CTRL + Z est mon meilleur ami.",
        "Il y a deux choses difficiles en informatique : l’invalidation du cache, la gestion des noms, et le off-by-one.",
        "Je code comme je fais de l’aquaponey : sans les mains, sans regret, sans logique.",
        "Mon framework préféré ? Aqua.js, full compatible poney sous-marin.",
        "Les bugs ? Je les corrige à dos de poney amphibie.",
        "Merge réussi pendant l’aquaponey... je suis officiellement un dev full-stack-natique.",
        "Aquaponey : où même ton CSS flotte dans la div.",
        "Le saviez-vous ? Tous les vrais devs font de l’aquaponey les jours de déploiement.",
        "J’ai appris à coder en apnée, entre deux galops aquatiques.",
        "Mon code ne plante pas, il fait des figures de style en aquaponey.",
        "RTFM ? Non, moi je RIDE THE FM... à dos de poney dans une piscine.",
        "Je suis Dev, je suis Poney, je suis Aqua – je suis en prod."
    ];
    const quoteElement = document.getElementById("footer-quote");
    if (quoteElement) {
        const index = Math.floor(Math.random() * quotes.length);
        quoteElement.textContent = quotes[index];
    }
}
randomQuote();
setInterval(randomQuote, 5000);

// Fonction pour améliorer la navigation par ancres avec navbar fixe
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne tous les liens avec des ancres
    const ancrage = document.querySelectorAll('a[href^="index.php#"]');

    ancrage.forEach(link => {
        link.addEventListener('click', function (e) {
            // Empêche le comportement par défaut
            e.preventDefault();

            // Récupère l'ancre à partir de l'attribut href
            const targetId = this.getAttribute('href').split('#')[1];
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                // Calcule la position avec un décalage pour la navbar
                const offset = 70; // Ajustez selon la hauteur de votre navbar
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - offset;

                // Scroll jusqu'à la position calculée
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});

