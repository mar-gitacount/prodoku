import  NavigationComponent from './components/NavigationComponent';
import  ExampleComponent from './components/ExampleComponent';
import EdopeopleComponent from './components/EdopeopleComponent';
import { createRouter, createWebHistory } from 'vue-router';
const routes = [
    // {
    //     path: "/",
    //     component: NavigationComponent,
    //     name:'home',
    // },
    {
        path:"/",
        name:'home',
        component: NavigationComponent
    },
    {
        path:'/edopeople',
        name:'edopeople',
        component: EdopeopleComponent
    },
    {
        path: '/example',
        name: 'example',
        component: ExampleComponent
    }
    
];

const router = createRouter({
    routes, // short for `routes: routes`
    history: createWebHistory(),
})

export default router;
