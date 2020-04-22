import Errors from './Errors';

class Form {
    constructor(data){
        this.noReset = [];
        this.successMessage = '';
        this.failMessage = '';
        this.originalData = data;
        this.errors = new Errors();
        this.submitting = false;

        for(let field in data){
            this[field] = data[field];
        }
    }

    data() {
        let data = {};

        for(let property in this.originalData){
            data[property] = this[property];
        }

        return data;
    }

    reset(){
        for(let field in this.originalData){
            if(!_.includes(this.noReset, field) && (field !== 'noReset'))
                this[field] = '';
        }

        this.errors.clear();
    }

    post(url) {
        return this.submit('post', url);
    }

    put(url) {
        return this.submit('put', url);
    }

    patch(url) {
        return this.submit('patch', url);
    }

    delete(url) {
        return this.submit('delete', url);
    }


    isSubmitting(){
        return this.submitting;
    }

    submit(requestType, url) {
        this.submitting = true;

        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data.errors);
                });
        });

    }

    onSuccess(data) {
        this.clearMessage();
        this.successMessage = data.message;
        this.reset();
        this.submitting = false;
    }

    onFail(data) {
        this.clearMessage();
        this.failMessage = data.message;
        this.errors.record(data.errors);
        this.submitting = false;
    }

    isSuccess() {
        return this.successMessage !== '';
    }

    isFail() {
        return this.failMessage !== '';
    }

    success(message) {
        this.successMessage = message;
    }

    fail(message) {
        this.failMessage = message;
    }

    clearErrors(event) {
        this.errors.clear(event);
        this.clearMessage();
    }

    clearMessage() {
        this.successMessage = '';
        this.failMessage = '';
    }
}

export default Form;