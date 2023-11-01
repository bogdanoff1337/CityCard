
import Home from '../pages/Home.vue';
import auth from '../pages/auth.vue';

const routes = [

  {
    path: '/',
    name: 'Home',
    component: Home,
  },

  {
    path: '/auth',
    name: 'auth',
    component: auth,
  },


];

export default routes;
