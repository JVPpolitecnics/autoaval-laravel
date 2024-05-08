<template>
    <h1>Inscrirure els alumnes a moduls</h1>

    <div class="d-flex justify-content-center">
        <div v-if="!alumnesAndModuls || loading" class="spinner-grow" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div>

        <div class="card" v-if="alumnesAndModuls" v-for="alumne in alumnesAndModuls.data">
            <h5 class="card-header">{{ alumne.nom }} <button type="button" class="btn btn-primary btn-sm">+</button>
            </h5>
            <div class="card-body">
                <div class="card" v-for="modul in alumne.has_modules">
                    <div class="card-header">
                        {{ modul.codi }}
                        <button type="button" class="btn btn-danger btn-sm" @click="deleteModul(id)">Desinscriu</button>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ modul.nom }}</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                    Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>


    </div>


</template>

<script>
import axios from 'axios'; // Import axios

export default {
    data() {
        return {
            alumnesAndModuls: null,
            showMessage: null,
            text: null,
            user
        }
    },

    created() {
        this.fetchUser();
        this.fetchModuls();
    },
    methods: {
        fetchUser(){
            axios.get('api/user/LogedIn')
        .then(response => {

          this.user = response.data;
          console.log(this.user);

         
        })
        .catch(error => {

          console.error('Error fetching logged-in user:', error);
        });

        },
        fetchModuls() {
            axios.get('api/modul').then(response => {
                this.alumnesAndModuls = response.data;
                console.log(this.alumnesAndCriteris);
            }).catch(error => {
                console.error('Error fetching data:', error);
            });
        },


        deleteModul(id) {
            const requestBody = {
                usuaris_id: mark
            };

            axios.put('api/modul/updateAlumneModuls/alumneId/{id}', requestBody)
                .then(response => {
                    console.log(response.data.message); // Log success message
                    // Handle success response
                    me.showMessage = "success";
                    me.text = "Nota actualitzada!"
                    window.location.reload().then(response => {





                    });

                    setTimeout(function () {
                        me.showMessage = null;
                    }, 6000);



                    me.loading = false;
                })
                .catch(error => {
                    console.error(error.response.data.error); // Log error message
                    // Handle error response
                    me.showMessage = "failure";
                    me.text = "Nota no ha pogut ser actualitzada!"
                    setTimeout(function () {
                        me.showMessage = null;
                    }, 6000);

                });
        }
    }
}
</script>

<style></style>