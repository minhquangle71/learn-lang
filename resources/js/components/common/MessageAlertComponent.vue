<template>
   <button @click="clickMe()">click here</button>
</template>

<script>
    export default {
        mounted() {
            // let instance = this.$toast.open('You did it!');
            console.log('ok')
            // Force dismiss specific toast
            // instance.dismiss();

            // // Dismiss all opened toast immediately
            // this.$toast.clear();
        },
        methods: {
            clickMe: function() {
                this.$toast.open({
                    message: "Test message from Vue",
                    type: "success",
                    duration: 1000 * 10,
                    dismissible: true
                })
            }
        }

    }
</script>
