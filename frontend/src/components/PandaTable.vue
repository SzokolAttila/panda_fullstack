<template>
<table class="mx-auto w-[96%] m-4">
    <tbody class="border border-green-800">
        <tr class="even:bg-green-800 even:text-white odd:bg-green-300 odd:text-black" v-for="entry in Object.entries(panda)">
            <th class="p-2 border border-green-800">
                {{ entry[0] }}
            </th>
            <td class="p-2 border border-green-800">
                {{ entry[1] }}
            </td>
        </tr>
    </tbody>
</table>
</template>

<script>
export default {
    props: {
        panda: Object
    }
}
</script>