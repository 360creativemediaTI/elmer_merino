<template>
    <div>
      <button @click="changeToken(true)" class="btn btn-primary">Activar Acceso Pagado</button>
      <button @click="changeToken(false)" class="btn btn-primary">Activar Acceso Libre</button>
    </div>
  </template>
  
  <script>
  import { changeApiToken } from '../axiosConfig';
  
  export default {
    methods: {
      changeToken(isPaid) {
        changeApiToken(isPaid);
      }
    }
  }
  </script>
  