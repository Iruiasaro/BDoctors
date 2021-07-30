window.addEventListener("load", () => {
    var myChart = new Vue({
        el: '#charts',
        data: {
            userId: '',
            datesReviewArray: [],
            dataX_1: [],
            dataY_1: [],
            dataX_2: [],
            dataY_2: [],
            reviewsCounts: []
        },
        methods: {
            chart1: function chart() {
                var myChart = document.getElementById('reviewsMonths').getContext('2d');
                var doctorChart = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: this.dataX_1.sort(),
                        datasets: [{
                            label: 'reviews',
                            data: this.dataY_1,
                            backgroundColor: ["#347ede90"],
                            responsive: true,
                            maintainAspectRatio: false,

                        }]
                    },
                    options: {}
                });
            },
            chart2: function chart() {
                var myChart = document.getElementById('voteMonths').getContext('2d');
                var doctorChart = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: this.dataX_2.sort(),
                        datasets: [{
                            label: 'vote',
                            data: this.dataY_2,
                            backgroundColor: ["#28B0ee90"],
                        }]
                    },
                    options: {
                    },

                });
            },
            getReviews() {
                axios
                    .get(`http://127.0.0.1:8000/api/reviews?user_id=${this.userId}`)
                    .then((resp) => {
                        console.log(resp.data.results)
                        this.getDates(resp.data.results);
                        this.getDates2(resp.data.results);
                        this.chart1(this.dataX_1, this.dataY_1);
                        this.chart2(this.dataX_2, this.dataY_2)

                    })
                    .catch((er) => {
                        console.error(er);
                        alert("Errore in fase di filtraggio dati.");
                    });

            },
            getDates(data) {
                reviews = data.reviews;
                reviews.forEach(review => {
                    data = moment(review.created_at).format('M-y');
                    this.datesReviewArray.push(data);
                });

                for (let i = 0; i < this.datesReviewArray.length; i++) {
                    count = 0;
                    for (let j = 0; j < this.datesReviewArray.length; j++) {
                        if (this.datesReviewArray[i] == this.datesReviewArray[j]) {
                            count++;
                        }
                    }
                    if (!this.dataY_1.includes(count)) {
                        this.dataY_1.push(count)
                        this.dataX_1.push(this.datesReviewArray[i]);
                    }

                }

            },
            getElementsCount(array, value) {
                return array.filter((v) => (v === value)).length;
            },
            getDates2(data) {
                data.reviews.forEach(element => {
                    this.dataX_2.push(moment(element.created_at).format('D-M-y'))
                    this.dataY_2.push(element.vote);
                })

            }
        },
        mounted: function mounted() {
            console.log("CHART!")
            this.userId = document.querySelector("meta[name='user-id']").getAttribute('content');
            this.getReviews();

        },

    });
})
