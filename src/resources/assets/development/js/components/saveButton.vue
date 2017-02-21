<template>
    <button v-on:click="save" class="button fadeTransition" :class="{'is-success':saved, 'is-loading':isLoading, 'is-disabled':!isPostDirty }">
        {{ buttonText }}
    </button>
</template>

<script>
    export default {
        props: ['post', 'isPostDirty'],
        data() {
            return {
                buttonText: 'Save',
                saved: false,
                isLoading: false
            };
        },
        methods: {
            save() {

                this.isLoading = true;

                this.$http.post('post/create', this.post).then(
                    response => {
                        if (response.body.status === 'ok') {

                            this.isLoading = false;
                            this.saved = true;
                            this.buttonText = 'Save';

                            setTimeout(() => {
                                this.buttonText = 'Save';
                                this.saved = false;
                            }, 2000);

                            this.$emit('saved')

                        }
                    },
                    response => {
                        console.log(response);
                    }
                );


//                this.$emit('save', {data: 'some event data'});
            }
        }
    }
</script>