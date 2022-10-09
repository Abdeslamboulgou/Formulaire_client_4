import Accordion from './components/Accordion.vue';
import AdminInterface from './components/AdminInterface.vue';
import { createRouter, createWebHistory } from "vue-router"



const routes = [

    {
        name: 'homeuser',
        path: '/user',
        component:  Accordion
    },
    {
        name: 'homeadmin',
        path: '/admin',
        component:  AdminInterface,
    },   
]

/*
const router =VueRouter.createRouter({
     history: VueRouter.createWebHistory(),
     routes,
} );*/
const router = createRouter({
      history : createWebHistory(),
      routes : routes
    })
    
export default router;


// export default routes