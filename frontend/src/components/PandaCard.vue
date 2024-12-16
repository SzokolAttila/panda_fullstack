<template>
    <div class="border border-green-800 rounded-md bg-green-300 text-green-800 p-2 flex flex-col flex-nowrap">
        <div>
            <ul>
            <li><b>Name:</b> {{ panda.name }}</li>
            <li> <b>Sex:</b> {{ panda.sex }}</li>
            <li> <b>Birth:</b> {{ panda.birth }}</li>
            <li> <b>Age:</b> {{ panda.age }}</li>
        </ul>
        </div>
        <div>
            <RouterLink :to="{name: 'panda', params: {id: panda.id}}" class="p-2 block mt-1 bg-green-800 rounded-md text-white hover:text-black border border-green-800 hover:bg-green-300">
                Reszletek
            </RouterLink>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        panda: Object
    }
}
</script>