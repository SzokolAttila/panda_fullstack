<template>
  <BaseLayout>
    <div class="bg-green-500/25 p-4 grid grid-cols-4 mx-auto my-4 gap-4">
      <SortButton @sort="sort('name', 'asc')" title="Nev szerint novekvo" />
      <SortButton @sort="sort('name', 'desc')" title="Nev szerint csokkeno" />
      <SortButton @sort="sort('age', 'asc')" title="Kor szerint novekvo" />
      <SortButton @sort="sort('age', 'desc')" title="Kor szerint csokkeno" />
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 p-8">
      <PandaCard v-for="panda in pandas" :key="panda.id" :panda />
    </div>
  </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue';
import SortButton from '@components/SortButton.vue';
import PandaCard from '@components/PandaCard.vue';
import { http } from "@utils/http";

export default {
  data(){
    return {
      pandas: [],
    }
  },
  components: {
    BaseLayout,
    SortButton,
    PandaCard
  },
  methods: {
    async sort(sortBy, sortDirection){
      const response = await http.get(`pandas?orderBy=${sortBy}&order=${sortDirection}`);
      this.pandas = response.data.data;
    }
  },
  async mounted(){
    const response = await http.get('pandas');
    this.pandas = response.data.data;
  }
}
</script>

<route lang="json">
  {
    "name": "index"
  }
</route>