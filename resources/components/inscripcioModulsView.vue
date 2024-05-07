<template>


</template>

<script>
import axios from 'axios'; // Import axios

export default {
    data() {
        return {

        }
    },

    created() {
        this.fetchModuls();
    },
    methods: {
        fetchModuls() {
            axios.get('api/modul').then(response => {
                this.alumnesAndCriteris = response.data;
                console.log(this.alumnesAndCriteris);
            }).catch(error => {
                console.error('Error fetching data:', error);
            });
        }
    }
}
</script>

<style></style>