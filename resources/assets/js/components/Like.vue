
<template>
   <div>
       <button type="button" class="btn btn-primary" @click="like(postID)">いいね</button>
   </div>
</template>

<script>
    export default {
        props: ['postID'],
        methods: {
            like(postID) {
                let url = '/api/blog/${postID}/like'
                axios.post(url)
                .then(response => {
                })
                .catch(error => {
                  alert(error)
                });
            },
        }
    }
</script>