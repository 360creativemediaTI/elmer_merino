<template>
    <div>
      <h2>Asignar Jugador a Equipo</h2>
      <form @submit.prevent="assignPlayer">
        <div class="mb-3">
          <label for="teamSelect" class="form-label">Equipo:</label>
          <select id="teamSelect" v-model="selectedTeam" class="form-control">
            <option v-for="team in teams" :key="team.id" :value="team.id">{{ team.nombre }}</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="playerSelect" class="form-label">Jugador:</label>
          <select id="playerSelect" v-model="selectedPlayer" class="form-control">
            <option v-for="player in players" :key="player.id" :value="player.id">{{ player.nombre }}</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar Jugador</button>
      </form>
      <p v-if="errorMessage" class="text-danger">{{ errorMessage }}</p>
      <p v-if="successMessage" class="text-success">{{ successMessage }}</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        teams: [],
        players: [],
        selectedTeam: '',
        selectedPlayer: '',
        errorMessage: '',
        successMessage: ''
      };
    },
    created() {
      this.fetchTeams();
      this.fetchPlayersWithoutTeam();
    },
    methods: {
      async fetchTeams() {
        try {
          const response = await axios.get('/api/equipos');
          this.teams = response.data;
        } catch (error) {
          this.errorMessage = 'Error fetching teams.';
        }
      },
      async fetchPlayersWithoutTeam() {
        try {
          const response = await axios.get('/api/jugadores-sin-equipo');
          this.players = response.data;
        } catch (error) {
          this.errorMessage = 'Error fetching players without team.';
        }
      },
      async assignPlayer() {
        try {
          await axios.post(`/api/equipos/${this.selectedTeam}/jugadores/${this.selectedPlayer}`);
          this.successMessage = 'Player assigned to team successfully.';
          this.errorMessage = '';
          this.selectedTeam = '';
          this.selectedPlayer = '';
          this.fetchPlayersWithoutTeam(); // Refresh the list of players without team
        } catch (error) {
          this.errorMessage = 'Error assigning player to team.';
          this.successMessage = '';
        }
      }
    }
  };
  </script>
  