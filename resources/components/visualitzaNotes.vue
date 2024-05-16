<template>
    <h1>Inscrirure els alumnes a moduls</h1>

        <div class="card" v-if="alumnesAndModuls && !id" v-for="alumne in alumnesAndModuls.data">
            <h5 class="card-header">{{ alumne.nom }}</h5>
            <div class="card-body">

                
                        <button type="button" class="btn btn-danger btn-sm"
                            @click="saveId(alumne.id)">Visualitza</button>
                   
        
            </div>
            
        </div>

       <div v-if="id">
        <h1>{{ id }}</h1>
        <visualitza :propId="id"></visualitza>
       </div>



</template>

<script>
import axios from 'axios'; // Import axios
import visualitza from './criterisView.vue';
export default {
    data() {
        return {
            alumnesAndModuls: null,
            id: null,
        }
    },

    created() {
        this.fetchModuls();
       
    },
    components: {
        visualitza
    },
    methods: {

     
       
        fetchModuls() {
            axios.get('api/modul').then(response => {
                this.alumnesAndModuls = response.data;
                console.log(this.alumnesAndModuls);
            }).catch(error => {
                console.error('Error fetching data:', error);
            });
        },


        saveId(id) {
            console.log(id);
           this.id = id;
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