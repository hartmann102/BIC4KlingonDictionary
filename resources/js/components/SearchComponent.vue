<template>
    <table class="table-latitude">
        <input id="searchString" placeholder="Enter slug" class="input" type="text">
        <button v-on:click="submit" class="button" type="submit">Submit</button>
        <h3 v-if="errorMsg">{{ errorMsg }}</h3>
        <text id="Error" class="textarea" type="text"></text>
        <tr v-for="translation in translations">
            <td>{{ translation.id }}</td>
            <td>{{ translation.slug }}</td>
            <td>{{ translation.name }}</td>
            <td>{{ translation.description }}</td>
        </tr>
    </table>
</template>


<script>

function Translation({id, slug, name, description}) {
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

            let found = false;
            let input = document.querySelector("#searchString").value;
            axios.get('/list/translation')
                .then((response) =>
                    response.data.forEach?.(translation => {
                        if (translation.slug === input) {
                            this.translations.push(new Translation(translation))
                            found = true;
                        }
                    }))

                .catch((error) => {
                    console.log(error)
                })
            if (found === false) {
                this.errorMsg = 'Not Found'
            }
        },

    }
}
</script>


<style scoped>

</style>
