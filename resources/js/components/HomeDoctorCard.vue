<template>
    <div class="card" style="">
            <img class="card-img-top" :src="img" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{name}}</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium deserunt nobis iure quasi debitis magnam.</p>
                <a :href="link" class="btn btn-primary" style="width:100%">Visualizza Profilo</a>
            </div>
        </div>
</template>

<script>
export default {
    name:"HomeDoctorCard",
    props:{
        img:String,
        name:String,
        link:String,
        
    },
    computed:{
        
    }
}
</script>