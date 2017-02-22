<template>
    <button class="button is-primary" :class="{'is-loading':isLoading}" v-on:click="createPost">Create new post</button>
</template>

<script>
    export default {
        data() {
            return {
                isLoading: false
            }
        },

        methods: {
            createPost() {
                this.isLoading = true;
                this.$http.post('post/create').then(response => {
                    if (response.body.status === 'ok') {
                        this.$router.push('/post/edit/' + response.body.post.id);
                        this.isLoading = false;
                    }
                }, response => {
                    this.isLoading = false;
                    console.log(response);
                })
            }
        }
    }
</script>