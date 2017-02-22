<template>
    <div class="has-text-centered">
        <p class="title is-3">Loading{{ dots }}</p>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.updateDotAmount();
        },
        data() {
            return {
                dotAmount: 0,
                laps: 0,
            };
        },
        methods: {
            updateDotAmount() {
                if (this.dotAmount % 3 === 0 && this.dotAmount !== 0) {
                    this.dotAmount = 0;
                    this.laps++;
                } else {
                    this.dotAmount++;
                }
                if (this.laps < 10) {
                    setTimeout(this.updateDotAmount, 333);
                }


            }
        },
        computed: {
            dots() {
                return '.'.repeat(this.dotAmount);
            }
        }
    }
</script>