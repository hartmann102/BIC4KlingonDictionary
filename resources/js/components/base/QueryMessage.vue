<template>
    <article class="message"
             v-bind:class="{'is-success': success, 'is-danger': fail}"
             v-if="show()">
        <div class="message-body">
            {{message}}
        </div>
    </article>
</template>

<script>
    export default {
        name: "QueryMessage",

        props: {
            success:{
                type: Boolean,
                required: true
            },
            fail: {
                type: Boolean,
                required: true
            },
            message: {
                required: true
            }
        },

        methods: {
            show() {
                return (this.success || this.fail);
            }
        }
    }
</script>
