window.addEventListener("load", () => {
    var myChart = new Vue({
        el: '#charts',
        data: {
            monthsForQuery: ['2021-01', '2021-02', '2021-03', '2021-04', '2021-05', '2021-06', '2021-07','2021-08'],
            months: ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago'],
            userId: '',
            datesReviewArray: [],
            dataX_1: [],
            dataY_1: [],
            dataX_2: [],
            dataY_2: [],
            dataY_3: [],
            reviewsCounts: [],
            messagesChart:{}
        },
        methods: {
            chart1: function chart() {
                var myChart = document.getElementById('reviewsMonths').getContext('2d');
                var reviewsChart = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: this.dataX_1,
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
                var votesChart = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: this.dataX_2,
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
            chart3: function chart() {
                var myChart = document.getElementById('messagesMonths').getContext('2d');
                this.messagesChart = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: this.months,
                        datasets: [{
                            label: 'messages',
                            data: this.dataY_3,
                            backgroundColor: ["#00C3A5"],
                            responsive: true,
                            maintainAspectRatio: false,

                        }]
                    },
                    options: {}
                });
            },
            getReviews() {
                axios
                    .get(`http://127.0.0.1:8000/api/reviews?user_id=${this.userId}`)
                    .then((resp) => {
                        resp.data.results.reviews.sort((a, b) => moment(a.created_at).format('YYYYMMDD') - moment(b.created_at).format('YYYYMMDD'));
                        console.log(resp.data.results)
                        this.getDates(resp.data.results);
                        this.getDates2(resp.data.results);
                        this.getMessagesByDate()
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
                    if (!this.dataX_1.includes(this.datesReviewArray[i])) {
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

            },
            getMessagesByDate() {

                this.monthsForQuery.forEach(month => {
                    axios
                        .get(`http://127.0.0.1:8000/api/messages?user_id=${this.userId}&date=${month}`)
                        .then((resp) => {
                            console.log(resp.data.results)
                            this.dataY_3.push(resp.data.results.message_count);
                            this.messagesChart.update();
                        })
                        .catch((er) => {
                            console.error(er);
                            alert("Errore in fase di filtraggio dati.");
                        });
                });

            },
        },
        mounted: function mounted() {
            console.log("CHART!")
            this.userId = document.querySelector("meta[name='user-id']").getAttribute('content');
            this.getReviews();
            this.chart3();

        },

    });
})
