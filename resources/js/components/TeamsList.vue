<template>
    <div>
      <h2>Listado de Equipos</h2>
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Nombre</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="team in teams" :key="team.id">
            <td>{{ team.nombre }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        teams: []
      };
    },
    mounted() {
      this.fetchTeams();
    },
    methods: {
      fetchTeams() {
        axios.get('/api/equipos')
          .then(response => {
            this.teams = response.data;
          })
          .catch(error => {
            console.error("There was an error fetching the teams:", error);
          });
      }
    }
  }
  </script>
  