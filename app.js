Vue.component('posts-plugin', {
    data() {
        return {
            posts: 'nothing here',
        };
    },
    computed: {
        sayHello(){
            return 2 * 3;
        }
    },
    methods: {
        fetchPosts(){
            fetch('http://localhost/Diez10/wp-json/wp/v2/posts/?search=href="https://diez10.mx"&per_page=99.')
            .then((res) => {
                return res.text();
            })
            .then ((res) => {
                this.posts = JSON.parse(res);
            });
        },
    },
    mounted() {
        this.fetchPosts();
    },
    template: '<div><div v-for="post, index in posts" :keys="index">{{ post }}</div></div>',

});

var vm = new Vue({

    el: '#hyperlinkUpdaterApp',
    /* data(){
        return{
            informations: {
                main:{
                    temp: undefined,
                },
            },
        };
    },
    computed: {
        
    },
    methods: {

    },
   
   
   data() {
        return {
            hello: 'world',
        };
    },
    computed: {
        sayHello(){
            return 2 * 3;
        }
    }*/


});