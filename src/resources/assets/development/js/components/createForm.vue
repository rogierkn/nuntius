<template>
    <div class="columns">
        <div class="column is-two-thirds">
            <h2 class="title is-3">New post</h2>
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
            <saveButton :post="post" :is-post-dirty="isPostDirty" v-on:saved="onSaved"></saveButton>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {
                    title: 'A blog title',
                    body: 'Your blog post',
                },
                isPostDirty: false,
            };
        },

        methods: {
            onSaved(data) {
                this.isPostDirty = false;
            }
        },

        watch: {
            // Check if form became dirty and can be saved
            'post.title'() {
                this.isPostDirty = true;
            },
            'post.body'() {
                this.isPostDirty = true;
            }
        }
    }
</script>