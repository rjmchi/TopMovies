<template>
    <div class="container">
        <div v-for = "classification in classifications" v-bind:key="classification.id">
            <h3>{{classification.name}}</h3>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Rank</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>

                <tr  v-for = "movie in classification.movies" v-bind:key="movie.id">
                    <td>{{movie.id}}</td>
                    <td>{{movie.rank}}</td>
                    <td>{{movie.name}}</td>
                    <td><button @click="editMovie(movie.id)" class="btn btn-primary">Edit</button></td>
                    <td><button @click="deleteMovie(movie.id)" class="btn btn-danger">Delete</button></td>
                </tr>

            </table>  
        </div>
    </div>
</template>

<script>
    export default {
        props:['classifications'],
        methods:{
            fetchMovies(page_url) {
                console.log('fetch');
                let vm = this;
                page_url = page_url || 'movies'; 
                fetch(page_url)
                    .then(res=>res.json())
                    .then(res => {
                        this.articles = res.data;
                        vm.makePagination(res.meta, res.links);
                    })
                    .catch(err=>console.log(err)); 
            },    
            editMovie(id) {
                alert('edit');
            },     
            deleteMovie(id) {
                if (confirm('Are you sure?')) {
                    fetch ('movies/'+id, {
                        method: 'delete'
                    })
                    .then(res=>res.json())
                    .then(
                        data => {
                            alert('Movie Deleted');
                            this.fetchMovies();
                        }
                    )
                    .catch(err=>console.log(err));
                }
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
