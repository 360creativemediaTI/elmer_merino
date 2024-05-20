<template>
    <div>
        <h1>Agregar Jugador a Equipo</h1>
        <form @submit.prevent="addPlayerToTeam">
            <div class="mb-3">
                <label for="equipo_id" class="form-label">Equipo:</label>
                <select class="form-select" v-model="teamId" required>
                    <option v-for="equipo in equipos" :key="equipo.id" :value="equipo.id">{{ equipo.nombre }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jugador_id" class="form-label">Jugador:</label>
                <select class="form-select" v-model="playerId" required>
                    <option v-for="jugador in jugadores" :key="jugador.id" :value="jugador.id">{{ jugador.nombre }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Jugador</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            teamId: '',
            playerId: '',
            equipos: [],
            jugadores: []
        }
    },
    mounted() {
        this.fetchTeams();
        this.fetchPlayers();
    },
    methods: {
        fetchTeams() {
            axios.get('/api/equipos')
                .then(response => {
                    this.equipos = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        fetchPlayers() {
            axios.get('/api/jugadores')
                .then(response => {
                    this.jugadores = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        addPlayerToTeam() {
            axios.post(`/api/equipos/${this.teamId}/jugadores`, { jugador_id: this.playerId })
                .then(response => {
                    alert('Jugador agregado correctamente!');
                    this.teamId = '';
                    this.playerId = '';
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
