<template>
    <div>
        <md-table v-model="terms" md-sort="id" md-sort-order="asc" md-card>
            <md-table-toolbar>
                <h1 class="md-title">Translations</h1>
                <p>Add another translation</p>
                <md-button class="md-icon-button md-raised" @click="showDialogAdd=true">
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
                <md-table-cell md-label="Translations">

                    <md-card>
                        <md-card-content>
                            <md-list>
                                <md-list-item @click="onClickTranslation(item.translations[0])">
                                    {{ item.translations[0].name }}
                                </md-list-item>
                            </md-list>
                        </md-card-content>
                        <md-card-expand>
                            <md-card-expand-trigger>
                                <md-button>show more translations</md-button>
                            </md-card-expand-trigger>
                            <md-card-expand-content>
                                <md-list>
                                    <md-list-item @click="onClickTranslation(translation)"
                                                  v-for="translation in item.translations.slice(1)" :key="translation.id">
                                        {{ translation.name }}
                                    </md-list-item>
                                </md-list>
                            </md-card-expand-content>
                        </md-card-expand>

                    </md-card>

                </md-table-cell>
                <md-table-cell class="table-actions" md-label="Actions">
                    <md-button @click="onClickDelete($event, item)"> <md-icon>delete</md-icon></md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
        <div>
            <md-dialog :md-active.sync="showDialogTranslation">
                <translation-view :translation="this.translationToPass" ></translation-view>
            </md-dialog>
            <md-dialog-confirm
                :md-active.sync="showDialogDelete"
                :md-title="deleteDialogTitle"
                :md-content="deleteDialogText"
                md-confirm-text="Delete"
                md-cancel-text="No"
                @md-confirm="onConfirmDelete"
            >
            </md-dialog-confirm>
        </div>
    </div>
</template>

<script>
    function Term({id, name, slug, description, translations, created_at, updated_at}) {
        this.id = id;
        this.name = name;
        this.slug = slug;
        this.description = description;
        this.translations= translations;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }
    function Translation({ id, slug, name, description, term_id, created_at, updated_at}) {
        this.id = id;
        this.slug = slug;
        this.name = name;
        this.description = description;
        this.created_at = created_at;
        this.updated_at = updated_at;
        this.term = [];
        this.term_id = term_id;
    }

    export default {
        name: "TermTableEditable",

        data() {
            return {
                terms: [],
                showDialogTranslation: false,
                showDialogDelete: false,
                translationToPass: Object,
                termToDelete: Object,
                deleteDialogTitle: "",
                deleteDialogText: ""
            }
        },
        methods: {
            async readAll() {
                const response = await axios.get('/list/term');
                response.data.forEach(term => this.terms.push(new Term(term)));
            },
            async update(term) {
                await axios.put('/term/' +  term.slug, term);
            },

            startEdit(event) {
                event.target.classList.add('active-input')
            },
            onEdit(event) {
                //kept this for now, might delete later since we dont need the method anymore
                //console.log(event.target.innerText);
            },
            stopEditName(event, term) {
                event.target.classList.remove('active-input')
                term.name = event.target.innerText;
                this.update(term)
            },
            stopEditDescription(event, term) {
                event.target.classList.remove('active-input')
                term.description = event.target.innerText;
                this.update(term)
            },
            onClickDelete(event, term) {
                this.showDialogDelete = true;
                this.deleteDialogTitle = "Delete " + term.name + "?";
                this.deleteDialogText = "Do you want to permanently delete term: " + term.name + "?";
                this.termToDelete = term;
            },
            onClickTranslation(item) {
                this.showDialogTranslation = true;
                this.translationToPass = item;
            },
            onConfirmDelete() {
                console.log("confirmed");
            }
        },
        created() {
            this.readAll();
        }
    }
</script>
