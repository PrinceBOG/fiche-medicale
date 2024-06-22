window.onload = function () {
    document.getElementById("download").addEventListener("click", () => {
        const fiche = document.getElementById("solid-tab3");
        var opt = {
            margin: 1, // Marges: haut, droite, bas, gauche (en pouces)
            filename: 'fiche_medicale.pdf',
            image: { type: 'png', quality: 0.98 }, // Qualité de l'image réduite
            html2canvas: { scale: 2 }, // Mise à l'échelle de html2canvas
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' } // Format de page et orientation
        };
        html2pdf().from(fiche).set(opt).save();
    })
}
