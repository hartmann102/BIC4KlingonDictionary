<template>
  <div id="TranslationForm">
    <form @submit.prevent = "submit">
      <input class="input" type="text" v-model="form.name">
      </input>
      <input class="input" type="text" v-model="form.description">
      </input>
      <div class="select">
        <select v-model="form.term_id">
          <option  v-for="term in terms" :value="term.id">{{term.name}}
          </option>
        </select>
</div>
<button class="button" type="submit">Button</button>
    </form>
  </div>
</template>
<script>


    let form = new Form({
        'translation_id': '',
        'name': '',
        'description': '',
        'term_id': '',
    });

    export default {
        name: "TranslationForm",
        data() {
            return {
                form: form,
                terms : [],
                }
          },
          created () {
          axios.get('/list/term')
              .then(response => {
                  this.terms = response.data;
                  })
          },
          components : {
            QueryMessage
          },
          methods : {
          submit () {
            this.form.post("/translation")
          }
          }
}



</script>
