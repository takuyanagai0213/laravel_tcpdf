<template>
    <div>{{ info.time }}</div>
</template>

<script>
import axios from 'axios';

    export default {
    data () {
        return {
        info: []
        }
    },
    mounted () {
        axios
        .get('/profile')
        .then(response => (this.info = response.data))
    }
    }
</script>