<template>
    <div>
      <h2>Listado de Jugadores</h2>
      <table>
        <tr>
          <th>Nombre</th>
        </tr>
        <tr v-for="player in players" :key="player.id">
          <td>{{ player.nombre }}</td>
        </tr>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        players: []
      };
    },
    mounted() {
      this.fetchPlayers();
    },
    methods: {
      fetchPlayers() {
        axios.get('/api/jugadores')
          .then(response => {
            this.players = response.data;
          })
          .catch(error => {
            console.error("There was an error fetching the players:", error);
          });
      }
    }
  }
  </script>
  