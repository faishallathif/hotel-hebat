<template>
    <div class="bg-primary">
      <Hero/>
      <Platform/>
      
    </div>
</template>

<script>
import Hero from './Hero'
import Platform from './Platform'
export default {
    components:{
        Platform,
        Hero,
    },
    mounted(){
        
        let logo = document.querySelectorAll("#logo-type path")
        let mask = document.querySelector('#mask')
        let css = ""
        logo.forEach((item,index) => {
             setTimeout(() => {
            mask.addEventListener('animationend',()=>{
                item.style.stroke="none"
                mask.style.display="none"
            })
            }, 3000);
        });
        
    }
};
</script>
<style scoped>
.banner {
    width: 100%;
    height: 268px;
}
.about {
    background-color: #917959;
}
#logo-type path{
    fill: black !important;
}

#logo-type path:nth-child(2){
    stroke-dasharray:125 ;
    stroke-dashoffset:125;
    animation:outline 2s ease forwards 0.3s;
}
#logo-type path:nth-child(3){
    stroke-dasharray:83 ;
    stroke-dashoffset:83;
    animation:outline 2s ease forwards 0.6s;
}
#logo-type path:nth-child(4){
    stroke-dasharray:68 ;
    stroke-dashoffset:68;
    animation:outline 2s ease forwards 0.8999999999999999s;
}
#logo-type path:nth-child(5){
    stroke-dasharray:91 ;
    stroke-dashoffset:91;
    animation:outline 2s ease forwards 1.2s;
}
#logo-type path:nth-child(6){
    stroke-dasharray:54 ;
    stroke-dashoffset:54;
    animation:outline 2s ease forwards 1.5s;
}
#logo-type path:nth-child(7){
    stroke-dasharray:124 ;
    stroke-dashoffset:124;
    animation:outline 2s ease forwards 1.8s;
}
#logo-type path:nth-child(8){
    stroke-dasharray:91 ;
    stroke-dashoffset:91;
    animation:outline 2s ease forwards 2.1s;
}
#logo-type path:nth-child(9){
    stroke-dasharray:106 ;
    stroke-dashoffset:106;
    animation:outline 2s ease forwards 2.4s;
}
#logo-type path:nth-child(10){
    stroke-dasharray:88 ;
    stroke-dashoffset:88;
    animation:outline 2s ease forwards 2.6999999999999997s;
}
#logo-type path:nth-child(11){
    stroke-dasharray:68 ;
    stroke-dashoffset:68;
    animation:outline 2s ease forwards 2.9999999999999996s;
}


@keyframes outline {
    to{
        stroke-dashoffset:0 ;
    }
}
@keyframes fill {
    to{
        fill: black;
    }
}
</style>
