import Vue from "vue";
import  NavigationComponent from './components/NavigationComponent';
import  TopComponent from './components/TopComponent';
import  SinbutuComponent from './components/SinbutuComponent';
import EdopeopleComponent from './components/EdopeopleComponent';
import AnimalComponent from './components/AnimalComponent';
import YoukaiComponent from './components/YoukaiComponent';
import  ExampleComponent from './components/ExampleComponent';
import  NewsComponent from './components/NewsComponent';
import  SearchComponent from './components/SearchComponent';
import { createRouter, createWebHistory } from 'vue-router';
const routes = [
    // {
    //     path: "/",
    //     component: NavigationComponent,
    //     name:'home',
    // },
    // {
    //     path:"/",
    //     name:'home',
    //     component: NavigationComponent
    // },
    {
        path:"/",
        name:'home',
        component: TopComponent
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
    },
    {
        path: '/news',
        name: 'news',
        component: NewsComponent
    },
    {
        path: '/search',
        name: 'search',
        component: SearchComponent
    }
    
];

const router = createRouter({
    routes, // short for `routes: routes`
    history: createWebHistory(),
})

export default router;
