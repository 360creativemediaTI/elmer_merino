<template>
    <div class="container">
        <h1>Crear Jugador</h1>
        <form @submit.prevent="createPlayer" class="mt-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" v-model="player.nombre" required>
            </div>
            <div class="mb-3">
                <label for="posicion" class="form-label">Posición:</label>
                <input type="text" class="form-control" v-model="player.posicion">
            </div>
            <button type="submit" class="btn btn-primary">Crear Jugador</button>
        </form>
    </div>
</template>


<script>
import axios from 'axios';
export default {
    data() {
        return {
            player: {
                nombre: '',
                posicion: ''
            }
        }
    },
    methods: {
        createPlayer() {
            axios.post('/api/jugadores', this.player)
                .then(response => {
                    alert('Jugador creado correctamente!');
                    this.player.nombre = '';
                    this.player.posicion = '';
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
