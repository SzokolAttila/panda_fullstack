<template>
<BaseLayout>
    <h1 v-if="panda != null" class="text-3xl text-center my-4">
       {{ panda.name }} 
    </h1>
    <PandaTable class="m-4" v-if="panda != null" :panda />
</BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue';
import { http } from '@utils/http';
import PandaTable from '@components/PandaTable.vue';
export default {
    data(){
        return {
            panda: null
        }
    },
    components: {
        BaseLayout,
        PandaTable
    },
    async mounted(){
        const response = await http.get(`pandas/${this.$route.params.id}`)
        this.panda = response.data.data;
    }
}
</script>
<route lang="json">
    {
        "name": "panda"
    }
</route>