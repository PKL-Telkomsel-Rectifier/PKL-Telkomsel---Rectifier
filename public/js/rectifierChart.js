import Chart from "chart.js";

const ctx = document.getElementById("rectifierChart");

new Chart(ctx, {
    type: "line",
    data: {
        labels: ["17:00", "18.00", "19.00", "20.00", "21.00"],
        datasets: [
            {
                label: "Rectifier Processor",
                data: [234, 123, 214, 221, 543],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
