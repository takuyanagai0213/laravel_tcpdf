<template>
    <div>
        <ul v-for="(room, floor) in info" v-bind:key="room">
            {{ floor }}
                <li v-for="(room_info) in room" v-bind:key="room_info">
                    <div v-bind:class="[room_info['NUM'] > 0 ? ' active' : 'nonactive' ]">
                        {{ room_info['ROOM_NAME'] }}
                    </div>
                </li>
        <!-- <ul v-for="conf in info[room]" :key="conf['ROOM_NAME']">
            {{ conf['ROOM_NAME'] }}
        </ul> -->
        </ul>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
    data () {
        return {
            info:  []
        }
    },
    mounted () {
        axios
        .get('/getConference')
        .then(response => (this.info = response.data))
    }
}
</script>
<style>
    .active{
        background-color: red;
    }
    .nonactive {
        background-color: blue;
    }
</style>
