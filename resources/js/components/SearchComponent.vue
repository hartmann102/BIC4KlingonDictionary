<template>
    <table class="table-latitude">
            <input class="input" type="text"">
        <tr v-for="translation in translations">
            <td>{{ translation.id }}</td>
            <td>{{ translation.slug }}</td>
            <td>{{ translation.name }}</td>
            <td>{{ translation.description }}</td>
        </tr>
            <button onclick="onsubmit" class="button" type="button">Submit</button>

    </table>
</template>


<script>

function Translation({ id, slug, name, description}) {
    this.id = id;
    this.slug = slug;
    this.name = name;
    this.description = description;
}

export default {
    name: "ListComponent",
    data() {
        return {
            translations: [],
            errorMsg: ''
        }
    },
    methods: {
        async onsubmit() {
            const response = await axios.get('/list/translation');
            response.data.forEach(translation => this.translations.push(new Translation(translation)));
        }
    },
    created() {
        this.read();
    }
}
</script>





<style scoped>

</style>
