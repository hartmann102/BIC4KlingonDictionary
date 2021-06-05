<template>
  <div id="TermForm">
    <query-message :success="this.form.isSuccess()" :fail="this.form.isFail()" :message="form.isSuccess() ? 'Success' : form.failMessage"></query-message>
    <form @submit.prevent = "submit">
      <label class="label">name</label>
      <input class="input" type="text" v-model="form.name">
      </input>
      <label class="label">desription</label>
      <input class="input" type="text" v-model="form.description">
      </input>

<button class="button is-fullwidth" type="submit">Submit</button>
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
        name: "TermForm",
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
            this.form.post("/term");
          }
          }
}



</script>
