import  NavigationComponent from './components/NavigationComponent';
import  ExampleComponent from './components/ExampleComponent';
import { createRouter, createWebHistory } from 'vue-router';
const routes = [
    // {
    //     path: "/",
    //     component: NavigationComponent,
    //     name:'home',
    // },
    {
        path:"/",
        component: NavigationComponent,
        name:'home'
    },
    {
        path: '/example',
        name: 'example',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: ExampleComponent
    }
    
];

const router = createRouter({
    routes, // short for `routes: routes`
    history: createWebHistory(),
})

export default router;
