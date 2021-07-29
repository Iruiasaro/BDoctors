window.addEventListener("load", () => {
    var myChart = new Vue({
        el: '#charts',
        data: {
            userId: '',
            datesReviewArray: []
        },
        methods: {
            chart: function chart(xData, yData ) {
                var myChart = document.getElementById('myChart').getContext('2d');
                var doctorChart = new Chart(myChart, {
                    type: 'bar',
                    data: {
                        labels: xData,
                        datasets: [{
                            label: 'reviews',
                            data: yData,
                            backgroundColor: ["#347ede90"], 
                        }]
                    },
                    options: {}
                });
            },
            getReviews() {
                axios
                    .get(`http://127.0.0.1:8000/api/reviews?user_id=${this.userId}`)
                    .then((resp) => {
                      console.log(resp.data.results)
                      this.getDates(resp.data.results)
                      this.chart(this.datesReviewArray,[1,7,6,1,2]);
                    })
                    .catch((er) => {
                        console.error(er);
                        alert("Errore in fase di filtraggio dati.");
                    });

            },
            getDates(data){
                reviews = data.reviews;
                reviews.forEach(review => {
                    this.datesReviewArray.push(moment(review.created_at).format('M-y'))
                    console.log(review.created_at)
                });
            }
        },
        mounted: function mounted() {
            console.log("CHART!")
            this.userId = document.querySelector("meta[name='user-id']").getAttribute('content');
            this.getReviews();

        },

    });
})
