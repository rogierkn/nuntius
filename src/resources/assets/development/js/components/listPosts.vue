<template>
    <div>

        <ul v-for="post in posts">
            <li>{{ post.title }}</li>
        </ul>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                posts: []
            };
        },

        mounted() {
            this.$http.get('posts').then(response => {
                if (response.body.status === 'ok') {
                    this.posts = response.body.posts;
                }
            }, response => {
                console.log('posts error');
            });
        }
    }
</script>