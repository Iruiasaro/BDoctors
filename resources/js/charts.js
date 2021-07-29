window.addEventListener("load", () => {
    var myChart = new Vue({
        el: '#charts',
        data: {},
        methods: {
            chart: function chart() {
                var myChart = document.getElementById('myChart').getContext('2d');
                var doctorChart = new Chart(myChart, {
                    type: 'line',
                    data: {
                        labels: ['10/07/2021', '11/07/2021', '12/07/2021'],
                        datasets: [{
                            label: 'cases',
                            data: [1, 2, 3, 4, 5, 6, 7]
                        }]
                    },
                    options: {}
                });
            }
        },
        mounted: function mounted() {
            console.log("CHART!")
            this.chart();

        }
    });
})
