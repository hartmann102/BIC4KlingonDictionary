<template>
    <table class="table-latitude">

        <tr v-for="item in translations">
            <td>{{ item.id }}</td>
            <td>{{ item.slug }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.description }}</td>
        </tr>
    </table>

</template>


<script>
export default {
    name: "SearchComponent"
}
</script>

<style scoped>

</style>
