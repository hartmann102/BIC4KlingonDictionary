<template>
    <table class="table-latitude">
        <input id="searchString" class="input" type="text">
        <button v-on:click="submit" class="button" type="submit">Submit</button>
        <tr v-for="translation in translations">
            <td>{{ translation.id }}</td>
            <td>{{ translation.slug }}</td>
            <td>{{ translation.name }}</td>
            <td>{{ translation.description }}</td>
        </tr>

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
        async submit() {
            let input = document.querySelector("#searchString").value;
            const response = await axios.get('/list/translation');
            response.data.forEach(translation => {
                   console.log(response.data.slug)
                if (translation.slug === input) {
                    this.translations.push(new Translation(translation))
                }

            })
            .catch((error) =>{
                console.log(error)
                this.errorMsg("Not Found")
                })
        }
        }
}
</script>


<style scoped>

</style>
