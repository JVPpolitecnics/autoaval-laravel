<template>
  <h1>Els teus criteris d'avaluació</h1>
  <div v-if="showMessage == 'success'" class="alert alert-success" role="alert">
    {{ text }}
  </div>
  <div v-if="showMessage == 'failure'" class="alert alert-danger" role="alert">
    {{ text }}
  </div>
  <div class="d-flex justify-content-center">
    <div v-if="!alumnesAndCriteris || loading" class="spinner-grow" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <div class="card" v-if="alumnesAndCriteris && !filterAndStetToEditableWithId && !loading"
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
        <h6 v-if="!updatedNota" :class="classNota(criteri.pivot.nota)">NOTA: {{ criteri.pivot.nota }}</h6>
        <h6 v-if="updatedNota" :class="classNota(updatedNota)">NOTA: {{ updatedNota }}</h6>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <div v-if="criteri.has_many_rubrica" v-for="(rubrica, index) in criteri.has_many_rubrica">
            <div v-on:mouseover="updateNotaVisually(index + 1)">
              <button type="button" @click="updateNotaApi(index + 1)" :class="classButtonNota(index + 1)">{{
                index + 1 }}</button>
            </div>
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
      alumnesAndCriteris: null,
      user: null,
      filterAndStetToEditableWithId: null,
      updatedNota: null,
      showMessage: null,
      text: null,
      loading: null,
    }
  },

  created() {
    this.fetchUsersAndCriteria();
  },
  methods: {
    updateNotaApi(mark) {
      const me = this;
      const requestBody = {
        nota: mark
      };
      axios.put('api/criteri/updateAlumnesCriteris/user/' + me.user.id + '/criteri/' + me.filterAndStetToEditableWithId, requestBody)
        .then(response => {
          console.log(response.data.message); // Log success message
          // Handle success response
          me.showMessage = "success";
            me.text = "Nota actualitzada!"
          window.location.reload().then(response => {
           

            me.filterAndStetToEditableWithId = null;
           
          
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
    },

    updateNotaVisually(num) {
      this.updatedNota = num;
    },
    showParticularCriteriAndEnableEdit(criteriId) {
      this.filterAndStetToEditableWithId = criteriId;
      console.log("clicked key: " + criteriId)
    },
    classNota(nota) {
      const numericNota = parseFloat(nota);
      if (numericNota == 3) {
        return 'card-text text-success';
      } else if (numericNota == 2) {
        return 'card-text text-warning'; // return an empty string if no additional class is needed
      } else if (numericNota == 1) {
        return 'card-text text-danger'; // return an empty string if no additional class is needed
      }
    },
    classButtonNota(nota) {
      console.log("hover and updated nota: " + this.updatedNota);
      const numericNota = parseFloat(nota);
      if (numericNota == 3) {
        return 'btn btn-success';
      } else if (numericNota == 2) {
        return 'btn btn-warning';
      } else if (numericNota == 1) {
        return 'btn btn-danger';
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
