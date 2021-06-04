<template>
    <div>
        <md-card>
            <md-card-header>
                <div class="md-subhead">Translation</div>
                <div class="md-title" contenteditable @focusin="startEdit" @focusout="stopEditName">
                    {{ this.translation.name }}
                </div>
            </md-card-header>

            <md-card-content>
                <div class="md-subhead">Description</div>
                <div contenteditable @focusin="startEdit" @focusout="stopEditDescription">
                    {{ this.translation.description }}
                </div>
            </md-card-content>
        </md-card>
    </div>
</template>

<script>

    import slugify from "slugify";

    export default {
        name: "TranslationViewComponent",
        props: {
            translation: Object
        },
        methods: {

            async update() {
                let res = await axios.put('/translation/' +  this.translation.slug, this.translation);
            },

            startEdit(event) {
                event.target.classList.add('active-input')
            },
            stopEditName(event) {
                event.target.classList.remove('active-input')
                this.translation.name = event.target.innerText;
                this.update()
                //after we updated the name in the backend we need to also make those changes in the frontend store.
                this.translation.slug = slugify(event.target.innerText, {lower: true});
            },
            stopEditDescription(event) {
                event.target.classList.remove('active-input')
                this.translation.description = event.target.innerText;
                this.update()
            }
        },
    }
</script>
