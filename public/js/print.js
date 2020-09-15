
Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
    router,
    data:{
        search: ''
    },
    methods:{
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        },1000),

        printme() {
            window.print();
        }
    }
});
