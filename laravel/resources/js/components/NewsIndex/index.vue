<template>

    <div class="w-100 d-flex flex-wrap">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch" v-for="(item,i) in news" :key="item.id + item.slug + i">
            <div class="card m-2">
                <img :src="item.thumbnail" class="card-img-top" alt="">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ item.title }}</h5>
                    <p class="card-text flex-grow-1">{{ cutNewsBody(item.body) }}</p>
                    <a :href="readNewsLink(item)" class="btn btn-primary">Read news</a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "NewsIndex",
        props:{
            news:{
                type: Array,
                require: true
            },
            routes:{
                type: [Array,Object],
                require: true
            }
        },
        methods:{
            cutNewsBody(str){
                return str.split(' ').reduce((acc,el,i) => {
                    (i < 15)?acc.push(el):'';
                    return acc;
                },[]).join(' ') + '...';
            },
            readNewsLink(data){
                return `${this.routes.newsIndex}/${data.id}`;
            }
        },
    }
</script>

<style scoped>

</style>