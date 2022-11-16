const lineCanvas = document.getElementById("lineCanvas");

const lineChart = new Chart(lineCanvas, {
    // on défini le type de graphique (line = ligne; bar = barre verticale...)
    type: "line",
    // on entre les données sur l'axe X
    data: {
        labels: ["Jour 1", "Jour 2", "Jour 3", "Jour 4", "Jour 5", "Jour 6", "Jour 7", "Jour 8", "Jour 9", "Jour 10"],
        datasets : [{
            label: "Calories absorbées",
            // On indique les données correspondantes sur l'axe Y
            data: [250, 1250, 1800, 1378, 3000, 2700, 1950, 1450, 2500, 3500],
            // couleur des points
            backgroundColor: "green",
            // couleur du trait
            // borderColor: "orange",
            // couleur de remplissage entre l'axe X et la ligne de données
            fill: false,
            // tension de la ligne de données
            tension: 0.38,
            hoverBorderWidth: 3,
        }],
    },
    options: {
        elements: {
            // changer la couleur de la ligne
            line: {
                borderColor: "orange",
            }
        },
        plugins: {
            title: {
                display: true,
                text: "Ta consommation de calories des 10 derniers jours",
                color: "white",
            },
        },
        scales: {
            y: {
                // indique le nombre min/max sur l'axe Y
                suggestedMin: 0,
                suggestedMax: 5000,
                ticks: {
                    // changer la couleur du texte
                    color: "#FFF",
                    // changer la taille de la police
                    font: {
                        size: 12,
                    }
                }
            },
            x: {
                ticks: {
                    color: "#FFF",
                    font: {
                        size: 12,
                    }
                }
            }
        }
    }
});