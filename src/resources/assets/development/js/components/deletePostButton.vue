<template>


    <span>
        <button v-on:click="openModal" class="button fadeTransition" :class="{'is-loading':isLoading }">
            Delete
        </button>
        <div class="fadeTransition modal" :class="{'is-active':showModal}">
            <div class="modal-background" v-on:click="closeModal"></div>
            <div class="modal-card">

                <header class="modal-card-head">
                    <p class="modal-card-title">Delete post confirmation</p>
                    <button v-show="canClose" class="delete" v-on:click="closeModal" :class="{'is-disabled':!canClose}"></button>
                </header>
                <section class="modal-card-body">
                    {{ modalContentText }}
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-danger" v-on:click="deletePost" :class="{'is-loading':isLoading, 'is-disabled':postDeleted }">{{deleteButtonText}}</a>
                    <a class="button fadeTransition" v-on:click="closeModal" :class="{'is-disabled':!canClose}">Cancel</a>
                </footer>

            </div>
            <button v-show="canClose" class="modal-close" v-on:click="closeModal" :class="{'is-disabled':!canClose}"></button>
        </div>
    </span>


</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                showModal: false,
                isLoading: false,
                canClose: true,
                postDeleted:false,
                deleteButtonText: 'Delete',
                modalContentText: "Are you sure you want to delete this post?"
            };
        },
        methods: {
            openModal() {
                this.showModal = true;
                this.modalContentText = "Are you sure you want to delete this post?";
            },
            closeModal() {
                if(!this.canClose) return;
                this.showModal = false;
            },

            deletePost() {
                this.isLoading = true;
                this.canClose = false;

                this.$http.delete('post/' + this.post.id).then(
                    response => {
                        if (response.body.status === 'ok') {

                            this.isLoading = false;
                            this.postDeleted = true;
                            this.deleteButtonText = 'Deleted';

                            setTimeout(() => {
                                this.$emit('postDeleted', this.post);
                            }, 1000);

                        }
                    },
                    response => {
                        this.isLoading = false;
                        this.canClose = true;
                        console.log(response);
                    }
                );

            }
        },
    }
</script>