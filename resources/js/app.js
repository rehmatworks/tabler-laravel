require('./bootstrap');
window.Vue = require('vue');
const app = new Vue({
    el: '#app',
    data() {
        return {
            'notifs': []
        }
    },
    mounted() {
        this.getNotifications();
    },
    methods: {
        getNotifications() {

        },
        signOut(url) {
            axios.post(url);
            window.setTimeout(function() {
                window.location = '';
            }, 1000);
        }
    }
});
