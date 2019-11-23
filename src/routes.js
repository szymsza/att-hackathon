import Login from "./pages/Login";
import Dashboard from './pages/Dashboard';
import Temperature from './pages/Temperature';
import Door from './pages/Door';
import Logout from './pages/Logout';
import NotFoundPage from './pages/not-found.vue';

export default [
  {
    path: '/',
    component: Login
  },
  {
    path: '/dashboard',
    component: Dashboard
  },
  {
    path: '/temperature/',
    component: Temperature
  },
  {
    path: '/door/',
    component: Door
  },
  {
    path: '/logout/',
    component: Logout
  },
  {
    path: '(.*)',
    component: NotFoundPage
  }
];
