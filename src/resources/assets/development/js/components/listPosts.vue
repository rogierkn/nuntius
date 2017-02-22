<template>
    <div>
        <h3 class="title is-3">Blog posts</h3>
        <h5 class="subtitle is-5 refresh" v-on:click="load">refresh</h5>
        <div class="columns">
            <div class="column is-two-thirds">
                <loading-text v-if="showLoadingText"></loading-text>
                <table v-else>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Last update</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody v-for="post in posts">
                    <tr>
                        <td>{{post.title}}</td>
                        <td>{{post.author}}</td>
                        <td>{{post.published ? '&#10003;' : '&#10005;' }}</td>
                        <td>
                            <timeago :since="post.updated_at" :auto-update="30"></timeago>
                        </td>
                        <td>
                            <router-link :to="{name: 'postEdit', params: {'id':post.id} }">&#9998;</router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="column">
                <create-post-button></create-post-button>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                showLoadingText: true
            };
        },

        mounted() {
            this.load();
        },
        methods: {
            load() {
                this.showLoadingText = true;
                this.$http.get('posts').then(response => {
                    if (response.body.status === 'ok') {
                        this.posts = response.body.posts;
                        this.showLoadingText = false;
                    }
                }, response => {
                    this.showLoadingText = false;
                    console.log('posts error');
                });
            }
        }
    }
</script>