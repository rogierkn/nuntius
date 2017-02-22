<template>
    <button v-on:click="save" class="button fadeTransition" :class="{'is-success':saved, 'is-loading':isLoading }">
        {{ buttonText }}
    </button>
</template>

<script>
    export default {
        props: ['post'],
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

                this.$http.put('post/' + this.post.id, this.post).then(
                    response => {
                        if (response.body.status === 'ok') {

                            this.isLoading = false;
                            this.saved = true;
                            this.buttonText = 'Save';

                            setTimeout(() => {
                                this.buttonText = 'Save';
                                this.saved = false;
                            }, 2000);

                            this.$emit('saved', response.body.post)

                        }
                    },
                    response => {
                        console.log(response);
                    }
                );

            }
        }
    }
</script>