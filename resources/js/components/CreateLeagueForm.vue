<template>
    <div class="container">
        <h1>Crear Liga</h1>
        <form @submit.prevent="createLeague">
            <div class="mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" v-model="league.nombre" required>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" v-model="league.fecha_inicio" required>
            </div>
            <div class="mb-3">
                <label for="fecha_fin">Fecha de Fin:</label>
                <input type="date" class="form-control" v-model="league.fecha_fin" required>
            </div>
            <div class="mb-3">
                <label for="cantidad_fechas">Cantidad de Fechas:</label>
                <input type="number" class="form-control" v-model="league.cantidad_fechas" required>
            </div>
            <div class="mb-3">
                <label for="es_nacional">Es Nacional:</label>
                <input type="checkbox" v-model="league.es_nacional">
            </div>
            <button type="submit" class="btn btn-primary">Crear Liga</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            league: {
                nombre: '',
                fecha_inicio: '',
                fecha_fin: '',
                cantidad_fechas: 0,
                es_nacional: true
            }
        }
    },
    methods: {
        createLeague() {
            axios.post('/api/ligas', this.league)
                .then(response => {
                    alert('Liga creada correctamente!');
                    this.league.nombre = '';
                    this.league.fecha_inicio = '';
                    this.league.fecha_fin = '';
                    this.league.cantidad_fechas = 0;
                    this.league.es_nacional = true;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
