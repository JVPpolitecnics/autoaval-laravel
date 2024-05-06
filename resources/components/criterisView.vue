<template>
  <h1>Els teus criteris d'avaluació</h1>
  
  <div class="d-flex justify-content-center">
  <div v-if="!alumnesAndCriteris" class="spinner-grow" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</div>

  <div class="card" v-if="alumnesAndCriteris && !filterAndStetToEditableWithId"
    v-for="criteri in alumnesAndCriteris.data.has_criteris" :key="criteri.id">
    <h5 class="card-header">Criteri {{ criteri.id }}</h5>
    <div class="card-body">
      <h5 class="card-title"> {{ criteri.descripcio }}</h5>
      <h6 :class="classNota(criteri.pivot.nota)">NOTA: {{ criteri.pivot.nota }}</h6>
      <a href="#" class="btn btn-primary" @click="showParticularCriteriAndEnableEdit(criteri.id)">Autoavalua't</a>
    </div>
  </div>

  <div class="card" v-if="alumnesAndCriteris && filterAndStetToEditableWithId"
    v-for="criteri in alumnesAndCriteris.data.has_criteris" :key="criteri.id">
   <div v-if="filterAndStetToEditableWithId == criteri.id">
    <h5 class="card-header">Criteri {{ criteri.id }}</h5>
    <div class="card-body">
      <h5 class="card-title"> {{ criteri.descripcio }}</h5>
      <h6 :class="classNota(criteri.pivot.nota)">NOTA: {{ criteri.pivot.nota }}</h6>
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
  <button type="button" class="btn btn-danger"  @mouseover="">0</button>
  <button type="button" class="btn btn-danger">1</button>
  <button type="button" class="btn btn-danger">2</button>
  <button type="button" class="btn btn-danger">3</button>
  <button type="button" class="btn btn-danger">4</button>
  <button type="button" class="btn btn-warning">5</button>
  <button type="button" class="btn btn-warning">6</button>
  <button type="button" class="btn btn-success">7</button>
  <button type="button" class="btn btn-success">8</button>
  <button type="button" class="btn btn-success">9</button>
  <button type="button" class="btn btn-success">10</button>
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
      alumnesAndCriteris: null,
      user: null,
      filterAndStetToEditableWithId: null
    }
  },

  created() {
    this.fetchUsersAndCriteria();
  },
  methods: {
    showParticularCriteriAndEnableEdit(criteriId) {
      this.filterAndStetToEditableWithId = criteriId;
      console.log("clicked key: " + criteriId)
    },
    classNota(nota) {
      const numericNota = parseFloat(nota);
      if (numericNota > 6) {
        return 'card-text text-success';
      } else if (numericNota == 5) {
        return 'card-text text-warning'; // return an empty string if no additional class is needed
      }
    },
    fetchUsersAndCriteria() {
      const me = this;
      axios.get('api/user/LogedIn')
        .then(response => {

          this.user = response.data;
          console.log(this.user);

          axios.get('api/criteri/loggedAlumneAndCriter/alumneId/' + me.user.id).then(response => {
            this.alumnesAndCriteris = response.data;
            console.log(this.alumnesAndCriteris);
          })
            .catch(error => {
              console.error('Error fetching data:', error);
            });
        })
        .catch(error => {

          console.error('Error fetching logged-in user:', error);
        });





    }
  }
}
</script>

<style></style>
