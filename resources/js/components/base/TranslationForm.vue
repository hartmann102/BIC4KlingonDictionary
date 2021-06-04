<template>
  <div id="TranslationForm">
    <query-message :success="this.form.isSuccess()" :fail="this.form.isFail()" :message="form.isSuccess() ? 'Success' : form.failMessage"></query-message>
    <form @submit.prevent = "submit">
      <label>name</label>
      <input class="input" type="text" v-model="form.name">
      </input>
      <label>description</label>
      <input class="input" type="text" v-model="form.description">
      </input>
      <div class="select">
        <select v-model="form.term_id">
          <option  v-for="term in terms" :value="term.id">{{term.name}}
          </option>
        </select>
</div>
<br/>
<button class="button" type="submit" :disabled="!loaded">Submit</button>
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
                terms : [{name:"...", id:-1}],
                loaded : false
                }
          },
          created () {
            this.form.term_id = this.terms[0].id;
          axios.get('/list/term')
              .then(response => {
                  this.terms = [];
                  this.terms = response.data;
                  this.form.term_id = this.terms[0].id;
                  this.loaded = true;
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
