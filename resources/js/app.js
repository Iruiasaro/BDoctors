/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 window.Vue = require('vue');
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('home-component', require('./components/HomeComponent.vue').default);
 Vue.component('home-doctor-card', require('./components/HomeDoctorCard.vue').default);
 Vue.component('search-input', require('./components/SearchInput.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
     mounted() {
         console.log("Component mounted.");
         axios
             .get("http://127.0.0.1:8000/api/specializations")
             .then((resp) => {
                 this.specializations = resp.data.results;
             })
             .catch((er) => {
                 console.error(er);
                 alert("Non posso recuperare i tag");
             });
             this.getCities();
     },
     data: {
         isLoading: false,
         isSearched: false,
         searchResult: [],
         filterResult: [],
         specializations: [],
         cities: [],
         selectedSpec: '',
         image: '',
         name: '',
         link: '',
         selectedStar: 'all',
         selectedCity: 'all'
 
     },
     methods: {
         resetFilters(data) {
             this.filterResult = data;
         },
         onSubmit() {
             this.selectedStar="all"
             this.isLoading = true;
             axios
                 .get(`http://127.0.0.1:8000/api/specialization_user?specialization_id=${this.selectedSpec}`)
                 .then((resp) => {
                     this.searchResult = resp.data.results;
                     this.isSearched = true;
                     this.resetFilters(resp.data.results);
                     this.addVoteToDoctor(resp.data.results);
                     this.filterSearchResult();
                 })
                 .catch((er) => {
                     console.error(er);
                     alert("Errore in fase di filtraggio dati.");
                 });
 
         },
         show(doctorId) {
             return `/show/${doctorId}`;
         },
         onChangeStar() {
             
             this.filterSearchResult();
         },
         filterSearchResult() {
             this.filterResult = this.searchResult.filter(user => {
                 voteInt = Math.round(user.vote);
                 if (voteInt == this.selectedStar || this.selectedStar == "all") {
                     return true;
                 }
             })
             this.filterResult = this.filterResult.filter(user=>{
                 if(this.selectedCity == user.city_id || this.selectedCity == 'all'){
                     return true;
                 }
             })
 
         },
         addVoteToDoctor(data) {
             this.searchResult.forEach((user, index) => {
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
             });
         },
         getCities(){
            axios
            .get(`http://127.0.0.1:8000/api/cities`)
            .then((resp) => {
                console.log(resp.data.results[0]);
                this.cities = resp.data.results[0];
            })
            .catch((er) => {
                console.error(er);
                alert("Errore in fase di filtraggio dati.");
            });
         }
     },
 });
 