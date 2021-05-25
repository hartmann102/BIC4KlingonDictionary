<template>
    <table class="table-latitude">
        <form v-on:submit.prevent="submit"></form>
            <input id="searchString" class="input" type="text">
        <tr v-for="translation in translations">
            <td>{{ translation.id }}</td>
            <td>{{ translation.slug }}</td>
            <td>{{ translation.name }}</td>
            <td>{{ translation.description }}</td>
        </tr>
            <button class="button" type="submit">Submit</button>

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
        async submit (){
            const response = await axios.get('/list/translation');
            let input = document.querySelector("#searchString").value;
            console.log(input);

            response.data.forEach(translation =>
                this.translations.push(new Translation(translation)));
            }
    },
    created() {
        this.submit();
    }
}
</script>


<style scoped>

</style>
