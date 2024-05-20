import Vue from 'vue';
import axios from 'axios';
import { changeApiToken } from './axiosConfig';

import TeamsList from './components/TeamsList.vue';
import PlayersList from './components/PlayersList.vue';
import CreatePlayerForm from './components/CreatePlayerForm.vue';
import CreateLeagueForm from './components/CreateLeagueForm.vue';
import TokenSwitcher from './components/TokenSwitcher.vue';

Vue.component('teams-list', TeamsList);
Vue.component('players-list', PlayersList);
Vue.component('create-player-form', CreatePlayerForm);
Vue.component('create-league-form', CreateLeagueForm);
Vue.component('token-switcher', TokenSwitcher);

new Vue({
  el: '#app'
});
