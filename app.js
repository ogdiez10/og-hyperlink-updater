Vue.component('posts-plugin', {
    data() {
        return {
            searching: '',
            posts: 'nothing here',
        };
    },
    computed: {
        sayHello(){
            return 2 * 3;
        }
    },
    methods: {
        async fetchPosts(){
            var url = wnm_custom.template_url + '/wp-json/wp/v2/posts/?search=' + this.searching + '&per_page=99';
            console.log(url)
            fetch(url)
            .then((res) => {
                return res.text();
            })
            .then ((res) => {
                this.posts = JSON.parse(res);
            });
        },
    },
    mounted() {
        //this.fetchPosts();
    },
    template: `<div>
    <h2>Hyperlink Updater.</h2>
    <div class="f">Search <input v-model="searching" placeholder="https://www.oldlink.com" type="text" /></div>
    <div class="f">Replace <input type="text" /></div>
    <div class="ff"><button @click="fetchPosts();">Check Results</button></div>
    <p class="note">Clicking on "Preview Changes" will show you all the coincidences before changing them on the Database</p>
    <h3>Results: </h3>
    <div v-for="post, index in posts" :keys="index">{{ post }}</div>
    </div>`,

});

var vm = new Vue({
    el: '#hyperlinkUpdaterApp'
});