
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios);
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);

// Views
import App from './App.vue';
import Dashboard from './components/dashboard.vue';
import Home from './components/home.vue';
// auth page
import Register from './components/auth/register.vue';
import Login from './components/auth/login.vue';
// companies
import CompanyCreate from './components/companies/CompaniesCreate.vue';
import CompanyEdit from './components/companies/CompaniesEdit.vue';
import CompanyIndex from './components/companies/CompaniesIndex.vue';
// users
import UserCreate from './components/users/UsersCreate.vue';
import UserEdit from './components/users/UsersEdit.vue';
import UserIndex from './components/users/UsersIndex.vue';

// bệnh nhân
import BenhNhanCreate from './components/benhnhan/Create.vue';
import BenhNhanEdit from './components/benhnhan/Edit.vue';
import BenhNhanIndex from './components/benhnhan/Index.vue';



axios.defaults.baseURL = 'http://localhost:8000/api';
const router = new VueRouter({
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    },{
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },{
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },{
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },{
        path: '/company',
        name: 'companies',
        component: CompanyIndex,
        meta: {
            auth: true
        }
    },{
        path: '/edit-company',
        name: 'edit-company',
        component: CompanyEdit,
        meta: {
            auth: true
        }
    },{
        path: '/new-company',
        name: 'new-company',
        component: CompanyCreate,
        meta: {
            auth: true
        }
    },{
        path: '/new-user',
        name: 'new-user',
        component: UserCreate,
        meta: {
            auth: true
        }
    },{
        path: '/edit-user',
        name: 'edit-user',
        component: UserEdit,
        meta: {
            auth: true
        }
    }
    ,{
        path: '/user',
        name: 'users',
        component: UserIndex,
        meta: {
            auth: true
        }
    },{
        path: '/benh-nhan',
        name: 'benh-nhan',
        component: BenhNhanIndex,
        meta: {
            auth: true
        }
    },{
        path: '/new-benh-nhan',
        name: 'new-benh-nhan',
        component: BenhNhanCreate,
        meta: {
            auth: true
        }
    },{
        path: '/edit-benh-nhan',
        name: 'edit-benh-nhan',
        component: BenhNhanEdit,
        meta: {
            auth: true
        }
    }
    ]
});

Vue.router = router
Vue.use(require('@websanova/vue-auth'), {
   auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
   http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
   router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});
App.router = Vue.router
new Vue(App).$mount('#app');