<template>
    <div>
        <md-table v-model="translations" md-sort="id" md-sort-order="asc" md-card>
            <md-table-toolbar>
                <h1 class="md-title">Translations</h1>
                <p>Add another translation</p>
                <md-button class="md-icon-button md-raised">
                    <md-icon>add</md-icon>
                </md-button>
            </md-table-toolbar>

            <md-table-row slot="md-table-row" slot-scope="{ item }">
                <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
                <md-table-cell md-label="Name" md-sort-by="name">
                    <div contenteditable @focusin=startEdit @focusout=stopEditName($event,item) @input=onEdit>
                        {{ item.name }}
                    </div>
                </md-table-cell>
                <md-table-cell md-label="Description">
                    <div contenteditable @focusin=startEdit @focusout=stopEditDescription($event,item) @input=onEdit>
                        {{ item.description }}
                    </div>
                </md-table-cell>
                <md-table-cell class="table-actions" md-label="Actions">
                    <md-button class="md-fab md-mini"><md-icon>delete</md-icon></md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>

    function Translation({ id, slug, name, description, term_id}) {
        this.id = id;
        this.slug = slug;
        this.name = name;
        this.description = description;
        this.created_at = "";
        this.updated_at = "";
        this.term = [];
        this.term_id = term_id;
    }

    export default {
        name: "TranslationTableEditable",

        data() {
            return {
                translations: []
            }
        },
        methods: {
            async readAll() {
                const response = await axios.get('/list/translation');
                response.data.forEach(translation => this.translations.push(new Translation(translation)));
            },
            async update(translation) {
                console.log(translation)
                const request = await axios.put('/translation/' +  translation.slug, translation);
                console.log(request)

            },

            startEdit(event) {
                event.target.classList.add('active')
            },
            onEdit(event) {
                //kept this for now, might delete later since we dont need the method anymore
                //console.log(event.target.innerText);
            },
            stopEditName(event, translation) {
                event.target.classList.remove('active')
                translation.name = event.target.innerText;
                this.update(translation)
            },
            stopEditDescription(event, translation) {
                event.target.classList.remove('active')
                translation.description = event.target.innerText;
                this.update(translation)
            },
        },
        created() {
            this.readAll();
        }
    }
</script>
