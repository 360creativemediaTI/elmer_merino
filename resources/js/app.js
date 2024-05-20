import Vue from 'vue';
import axios from 'axios';
import { changeApiToken } from './axiosConfig';

import TeamsList from './components/TeamsList.vue';
import PlayersList from './components/PlayersList.vue';
import CreatePlayerForm from './components/CreatePlayerForm.vue';
import CreateLeagueForm from './components/CreateLeagueForm.vue';
import TokenSwitcher from './components/TokenSwitcher.vue';
import AssignPlayerToTeam from './components/AssignPlayerToTeam.vue';
import CreateTeamForm from './components/CreateTeamForm.vue';

Vue.component('teams-list', TeamsList);
Vue.component('players-list', PlayersList);
Vue.component('create-player-form', CreatePlayerForm);
Vue.component('create-league-form', CreateLeagueForm);
Vue.component('token-switcher', TokenSwitcher);
Vue.component('assign-player-to-team', AssignPlayerToTeam);
Vue.component('create-team-form', CreateTeamForm); 

axios.interceptors.response.use(
  response => response,
  error => {
    if (error.response && error.response.status === 429) {
      alert('Too Many Attempts. You have exceeded your request limit.');
    }
    return Promise.reject(error);
  }
);

new Vue({
  el: '#app'
});
