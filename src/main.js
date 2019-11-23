/* eslint-disable no-unused-vars */
// Import Vue
import Vue from 'vue';

import axios from "axios";

// Import F7
import Framework7 from 'framework7/framework7.esm.bundle.js';

// Import F7 Vue Plugin
import Framework7Vue from 'framework7-vue/framework7-vue.esm.bundle.js';

// Import F7 Styles
import Framework7Styles from 'framework7/css/framework7.css';

// Import Icons and App Custom Styles
import IconsStyles from './css/icons.css';
import AppStyles from './css/app.css';

// Import Routes
import Routes from './routes.js';

// Import App Component
import App from './App';

// Set up some useful globals
window.isMaterial = !Framework7.device.ios;
window.isiOS = Framework7.device.ios;

// Init F7 Vue Plugin
Framework7.use(Framework7Vue);

let main = {};

// Mixins
Vue.mixin({
	methods: {
		// API
		$api(options) {
			let defaults = {
				url: "",
				baseURL: "http://localhost/slipky/server/public/api",
				data: {},
				sendToken: true,
				method: "post",
				headers: {}
			};

			let requestOptions = {...defaults, ...options};

			//requestOptions.url = requestOptions.baseURL + requestOptions.url;

			if (requestOptions.sendToken)
				requestOptions.data.app = this.$db("token");

			return axios(requestOptions);
		},

		$toast(text) {
			let toast = this.$f7.toast.create({
				text: text,
    			closeTimeout: 2000,
			});
			this.$f7.toast.open(toast.$el);
		},

		// Simple global database interface

		// @key: Index for the value to be stored under
		// @value: null = read value; undefined = delete value; other = set value
		$db(key, value = null) {
			// Select request
			if (value === null) return main[key];

			// Delete request
			if (value === undefined) return delete main[key];

			// Insert/update request
			return (main[key] = value);
		},
	}
});

// Init App
const baseApp = new Vue({
	el: '#app',
	template: '<app/>',
	// Register App Component
	components: {
		app: App
	}
});
