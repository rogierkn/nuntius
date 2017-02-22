<template>
    <button v-on:click="publishToggle" class="button fadeTransition" :class="{'is-success':publishToggled, 'is-loading':isLoading }">
        {{ buttonText }}
    </button>
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                publishToggled: false,
                isLoading: false
            };
        },
        methods: {
            publishToggle() {

                this.isLoading = true;

                this.$http.put('post/' + this.post.id + '/published/toggle', this.post).then(
                    response => {
                        if (response.body.status === 'ok') {

                            this.isLoading = false;
                            this.publishToggled = true;

                            setTimeout(() => {
                                this.publishToggled = false;
                            }, 2000);

                            this.$emit('publishToggled', response.body.post)

                        }
                    },
                    response => {
                        this.isLoading = false;

                        console.log(response);
                    }
                );

            }
        },

        computed: {
            buttonText() {
                return this.post.published ? 'Unpublish' : 'Publish';
            }
        }
    }
</script>