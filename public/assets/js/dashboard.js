import Chart from 'chart.js';

// Retrieve the data for the chart from your backend
const userData = @json($userData) // Assuming you have a variable $userData containing the user statistics

// Get the canvas element where the chart will be rendered
const chartCanvas = document.getElementById('user-chart');

// Create the chart
new Chart(chartCanvas, {
    type: 'bar',
    data: {
        labels: userData.labels,
        datasets: [{
            label: 'User Statistics',
            data: userData.data,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
