import Chart from 'chart.js/auto';

const canvas = document.getElementById('salesChart');

if (canvas) {

    const salesData = JSON.parse(
        canvas.dataset.chart
    );

    const labels = salesData.map(item => item.date);

    const totals = salesData.map(item => Number(item.total));

    new Chart(canvas, {

        type: 'line',

        data: {

            labels,

            datasets: [{

                label: 'Revenue',

                data: totals,

                borderColor: '#198754',

                backgroundColor: 'rgba(25,135,84,.15)',

                fill: true,

                tension: .4,

                pointRadius: 5,

                pointHoverRadius: 7,

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: false

                }

            }

        }

    });

}