<template>
    <h1>Inscrirure els alumnes a moduls</h1>

    <div class="d-flex justify-content-center">
        <div v-if="!alumnesAndModuls || loading" class="spinner-grow" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div>
        <div v-if="askModul && allModuls">
            <select v-model="selectedModul" class="form-select" aria-label="Default select example">
                
                  
                    <option v-for="item in allModuls.data" :value="item.id">{{ item.codi }}</option>
                
            </select>
            <div v-if="selectedModul && selectedAlumne">
                <h1>{{ selectedModul }}  :: {{ selectedAlumne  }}</h1>
                <button class="btn btn-primary btn-sm" @cilck="updateModul(selectedModul, selectedAlumne, false)">Inscriu</button>
            </div>
            
        </div>
        <div class="card" v-if="alumnesAndModuls && allModuls" v-for="alumne in alumnesAndModuls.data">
            <h5 class="card-header">{{ alumne.nom }} <button type="button" @click="askWhatModul(alumne.id)"
                    class="btn btn-primary btn-sm">+</button>
            </h5>
            <div class="card-body">

                <div class="card" v-for="modul in alumne.has_modules">
                    <div class="card-header">
                        {{ modul.codi }}
                        <button type="button" class="btn btn-danger btn-sm"
                            @click="updateModul(modul.id, alumne.id, true)">Desinscriu</button>
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
            user: null,
            allModuls: null,
            askModul: false,
            selectedAlumne: null,
            selectedModul: null
        }
    },

    created() {
        this.fetchUser();
        this.fetchModuls();
        this.getAllModuls();
    },
    methods: {
        getAllModuls() {
            axios.get('api/allModuls')
                .then(response => {

                    this.allModuls = response.data;
                    console.log(this.allModuls);


                })
                .catch(error => {

                    console.error('Error fetching logged-in user:', error);
                });

        },
        askWhatModul(idAlumne) {
            this.askModul = true
            this.selectedAlumne = idAlumne
        },
        fetchUser() {
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


        updateModul(idModul, idAlumne, elminate) {
            console.log("update");
            const me = this;
            let requestBody;
            if(elminate){
                requestBody = {
                actiu: 0
            };
        } else {
            requestBody = {
                actiu: 1
            };
        }

            axios.put('api/modul/updateAlumneModuls/alumneId/' + idAlumne + '/modul/' + idModul, requestBody)
                .then(response => {
                    console.log(response.data.message); // Log success message
                    // Handle success response
                    console.log("update");
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
                    console.log("update no funcionó")
                    me.showMessage = "failure";
                    me.text = "Nota no ha pogut ser actualitzada!"
                    setTimeout(function () {
                        me.showMessage = null;
                    }, 6000);

                });
        },
        inscriuModul(idModul, idAlumne) {
            const me = this;
            const requestBody = {
                actiu: 1
            };

            axios.put('api/modul/updateAlumneModuls/alumneId/' + idAlumne + '/modul/' + idModul, requestBody)
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