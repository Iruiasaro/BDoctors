<template>
  <div>
    <form action="" @submit.prevent="onSubmit">
      <h1 class="text-white mb-5">Cerca un dottore nella tua zona.</h1>
      <select v-model="selectedSpec" class="my-select" name="specialization" id="">
        <option disabled>Scegli una specializzazione</option>
        <option
          v-for="specialization in specializations"
          :key="specialization.id"
          :value="specialization.id"
        >
          {{ specialization.specs_type }}
        </option>
      </select>

      <select class="my-select" name="citta" id="">
        <option disabled>Scegli una città</option>
        <option value="roma">Roma</option>
        <option value="milano">Milano</option>
        <option value="milano">Carlopoli</option>
        <option value="milano">Siracusa</option>
        <option value="milano">Senigallia</option>
        <option value="milano">Vicenza</option>
      </select>
      <button class="btn btn-primary" type="submit">Cerca</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "SearchInput",
  mounted() {
    console.log("Component mounted.");
    axios
      .get("http://127.0.0.1:8000/api/specializations")
      .then((resp) => {
        console.log(resp.data.results);
        this.specializations = resp.data.results;
      })
      .catch((er) => {
        console.error(er);
        alert("Non posso recuperare i tag");
      });
  },
  data() {
    return { 
        specializations: [] ,
        selectedSpec : ''
        };
  },
  methods: {
    onSubmit() {
      axios
        .get(`http://127.0.0.1:8000/api/specialization_user?specialization_id=${this.selectedSpec}`)
        .then((resp) => {
          console.log(resp)
        })
        .catch((er) => {
          console.error(er);
          alert("Errore in fase di filtraggio dati.");
        });
    },
  },
};
</script>
