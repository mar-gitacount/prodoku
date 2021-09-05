import  NavigationComponent from './components/NavigationComponent';
import  SinbutuComponent from './components/SinbutuComponent';
import EdopeopleComponent from './components/EdopeopleComponent';
import AnimalComponent from './components/AnimalComponent';
import YoukaiComponent from './components/YoukaiComponent';
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
        name:'home',
        component: NavigationComponent
    },
    {
        path:'/sinbutu',
        name:'sinbutu',
        component: SinbutuComponent
    },
    {
        path:'/edopeople',
        name:'edopeople',
        component: EdopeopleComponent
    },
    {
        path:'/animal',
        name:'animal',
        component: AnimalComponent
    },
    {
        path:'/youkai',
        name:'youkai',
        component: YoukaiComponent
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
