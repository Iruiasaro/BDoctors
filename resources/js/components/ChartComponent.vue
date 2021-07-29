<template>
  <div class="flex-grow-1">
    <div id="charts">
      <div>
        <canvas id="myChart">{{ userId }}</canvas>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ChartComponent",
  props: {
    userId: String,
  },
  data() {
    return {
      userId: userId,
    };
  },
  methods: {
    chart: function chart() {
      var myChart = document.getElementById("myChart").getContext("2d");
      var doctorChart = new Chart(myChart, {
        type: "bar",
        data: {
          labels: [
            "10/07/2021",
            "11/07/2021",
            "12/07/2021",
            "12/07/2021",
            "12/07/2021",
            "12/07/2021",
            "12/07/2021",
          ],
          datasets: [
            {
              label: "cases",
              data: [1, 2, 3, 4, 5, 6, 7],
            },
          ],
        },
        options: {},
      });
    },
    getReviews() {
      axios
        .get(`http://127.0.0.1:8000/api/reviews?user_id=${user.id}`)
        .then((resp) => {
          user.vote = resp.data.results.vote;
          if (index == this.searchResult.length - 1) {
            this.isLoading = false;
          }
        })
        .catch((er) => {
          console.error(er);
          alert("Errore in fase di filtraggio dati.");
        });
    },
    mounted: function mounted() {
      console.log("CHART!");
      this.chart();
    },
  },
  computed: {},
};
</script>