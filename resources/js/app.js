require('./bootstrap');
window.Vue = require('vue');

import {Confirm, Toast} from 'wc-messagebox';
import 'wc-messagebox/style.css';
Vue.use(Confirm);
Vue.use(Toast,  {location: 'center', duration: 3000});

Vue.component('pagination', require('laravel-vue-pagination'));

import UsersComponent from './components/users/UsersComponent';
Vue.component('users-component', UsersComponent);

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
