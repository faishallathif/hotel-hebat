<template>
    <div class="">
        <div class="bg-primary">
            <Hero/>
            <Platform/>
        </div>
        <div class="container tw-my-16">
            <CardCarousel bgColor="tw-bg-pink2" title="Fasilitas Umum">
                <template v-slot:button>
                    <button class="tw-btn tw-bg-pink1 tw-rounded-full tw-w-52">
                        Lihat Semua
                    </button>
                </template>
                <div class="">

                </div>
            </CardCarousel>
        </div>
    </div>
</template>

<script>
import CardCarousel from '../../components/CardCarousel.vue';
import Hero from './Hero'
import Platform from './Platform'
export default {
    components:{
        Platform,
        Hero,
        CardCarousel,
    },
    
};
</script>
<style scoped>
</style>
