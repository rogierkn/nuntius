<template>
    <div>
        <loading-text v-if="showLoadingText"></loading-text>
        <div v-else class="columns">
            <div class="column is-two-thirds">
                <div class="level">
                    <div class="level-left">
                        <h2 class="title is-3 level-item">New post</h2>
                    </div>
                    <div class="level-right">
                        <p class="level-item">
                            last updated&nbsp;
                            <timeago :since="post.updated_at" :auto-update="30" v-if="!!post"></timeago>
                        </p>
                    </div>
                </div>
                <div class="level">
                    <span>Title&nbsp;</span>
                    <input type="text" v-model="post.title" class="input">
                </div>
                <div>
                    <textarea class="textarea" v-model="post.body"></textarea>
                </div>
            </div>

            <div class="column">
                <h2 class="title is-4">Actions</h2>
                <saveButton :post="post" v-on:saved="onSaved"></saveButton>
                <publishToggleButton :post="post" v-on:publishToggled="onPublishToggled"></publishToggleButton>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],

        mounted() {
            this.$http.get('post/' + this.id).then(response => {
                if (response.body.status === 'ok') {
                    this.post = response.body.post
                }
                this.showLoadingText = false;
            }, response => {
                console.log(response);
                this.showLoadingText = false;
            })
        },

        data() {
            return {
                post: false,
                showLoadingText: true,
            };
        },

        methods: {
            onSaved(post) {
                this.post = post;
            },

            onPublishToggled(post) {
                this.post = post;
            }
        },


    }
</script>