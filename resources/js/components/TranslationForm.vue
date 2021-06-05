<template>
  <div id="TranslationForm">
    <query-message :v-if="false" :success="this.form.isSuccess()" :fail="this.form.isFail()" :message="form.isSuccess() ? 'Success' : form.failMessage"></query-message>
    <form @submit.prevent = "submit">
      <label class="label">name</label>
      <input class="input" type="text" v-model="form.name">
      </input>
      <label class = "label">description</label>
      <input class="input" type="text" v-model="form.description">
      </input>
      <div class="select is-fullwidth">
        <select class="select is-fullwidth" v-model="form.term_id" single="true">
          <option  v-for="term in terms" :value="term.id">{{term.name}}
          </option>
        </select>
</div>
<br/>
<button class="button is-fullwidth" type="submit" :disabled="!loaded">Submit</button>
    </form>
  </div>
</template>
<script>


    let form = new Form({
        'translation_id': '',
        'name': '',
        'description': '',
        'term_id': '',
        'noReset' : ['term_id']
    });

    export default {
        name: "TranslationForm",
        props : {
          preferedTerm : {
            required : false,
            type : Number,
            default : 0
          }
        },
        data() {
            return {
                form: form,
                terms : [{name:"...", id:-1}],
                loaded : false,
                showResult : false
                }
          },
          created () {
            console.log(this.showResult);
            this.showResult = false;
            console.log(this.showResult);
            this.form.success = false;
            this.form.fail = false;
            this.form.failMessage = "";
            this.form.term_id = this.terms[0].id;
          axios.get('/list/term')
              .then(response => {
                  this.terms = [];
                  this.terms = response.data;
                  if(this.preferedTerm === 0){
                    this.form.term_id = this.terms[0].id;
                  }
                  else{
                    this.form.term_id = this.preferedTerm;
                  }
                  this.loaded = true;
                  })
          },
          components : {
            QueryMessage
          },
          methods : {
          submit () {
            this.form.post("/translation");
            this.showResult = true;
          }
          }
}



</script>
