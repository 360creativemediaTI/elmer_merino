<template>
    <div>
      <h2>Crear Equipo</h2>
      <form @submit.prevent="createTeam">
        <div class="mb-3">
          <label for="teamName" class="form-label">Nombre del Equipo:</label>
          <input type="text" class="form-control" id="teamName" v-model="teamName">
        </div>
        <button type="submit" class="btn btn-primary">Crear Equipo</button>
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
        teamName: '',
        errorMessage: '',
        successMessage: ''
      };
    },
    methods: {
      async createTeam() {
        try {
          const response = await axios.post('/api/equipos', {
            nombre: this.teamName
          });
          this.successMessage = 'Equipo creado con éxito.';
          this.errorMessage = '';
          this.teamName = '';
        } catch (error) {
          this.errorMessage = 'Error al crear el equipo.';
          this.successMessage = '';
        }
      }
    }
  };
  </script>
  