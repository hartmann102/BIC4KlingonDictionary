<template>
    <div>
        <slot></slot>
        <table class="table-latitude">
            <tr>
                <th>Id</th>
                <th>Slug</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <tr v-for="item in translations">
                <td>{{ item.id }}</td>
                <td>{{ item.slug }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.description }}</td>
            </tr>
        </table>
    </div>
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
                translations: []
            }
        },
        methods: {
            async read() {
                const response = await axios.get('/list/translation');
                response.data.forEach(translation => this.translations.push(new Translation(translation)));
            }
        },
        created() {
            this.read();
        }
    }
</script>
