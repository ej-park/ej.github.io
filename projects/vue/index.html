<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giphy Simple</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins|Rubik+Mono+One&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>  
</head>

<body>
    <header>
        <h1>Giphy Simple</h1>
    </header>
    <main id="app">    
        <section>
            <input type="text" name="query" v-model="query" @keyup="searchGifs" placeholder="Search GIFs">
        </section>

        <section>
            <gif_row :gifs="searchedGifs"></gif_row>
        </section>

        <section>
            <h2>Trending Gifs</h2>
            <gif_row :gifs="trendingGifs"></gif_row>
        </section>
    </main>

    <script>
        Vue.component('gif_box', {
            props: ['gif'],
            template: `
                <div class="gif_box">
                    <a :href="gif.url" target="_blank">
                        <div class="gif_frame">
                            <img class="gif_img" :src="gif.images.original.url">
                        </div>
                    </a>
                    <div class="user_overlay">
                        <a class="user_frame" v-if="gif.user" :href="gif.user.profile_url" target="_blank">
                            <div class="user">
                                <div class="gif_user">
                                    <img :src="gif.user.avatar_url" class="user_img">
                                    {{ gif.user.display_name }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            `
        });

        Vue.component('gif_row', {
            props: ['gifs'],
            template: `
                <div class="carousel">
                    <div class="row" v-if="gifs">
                        <div v-for="gif in gifs">
                            <gif_box :gif="gif"></gif_box>
                        </div>
                    </div>
                </div>
            `
        });

        const app = new Vue({
            el: '#app',

            data: {
                apiUrl: 'https://api.giphy.com/v1/gifs',
                apiKey: '80bfcbf357864cd18518c324f47a7098',
                trendingGifs: null,
                searchedGifs: null,
                query: ''
            },

            methods: {
                fetchGifs: function() {
                    const url = `${this.apiUrl}/trending?api_key=${this.apiKey}&limit=9`;

                    fetch(url)
                        .then(response => response.json())
                        .then(data => this.trendingGifs = data.data);
                },
                searchGifs: function() {
                    const url = `${this.apiUrl}/search?api_key=${this.apiKey}&q=${this.query}&limit=9`;
                    fetch(url)
                        .then(response => response.json())
                        .then(data => this.searchedGifs = data.data);
                }
            },

            created: function() {
                this.fetchGifs();
            }
        });
    </script>
</body>
</html>