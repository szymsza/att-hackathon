<template>
	<f7-page>
		<f7-navbar sliding>
			<f7-nav-title>
				Login
			</f7-nav-title>
		</f7-navbar>
		<f7-block-title>{{ title }}</f7-block-title>
		<f7-block inner>
			<f7-button text="login" type="button" @click="login" />
			Lorem ipsum dolor sit amet, consectetur adipisicing elit.
			Distinctio est aliquam officiis quaerat placeat, cum explicabo magni
			soluta totam maxime autem minima accusamus eos suscipit dignissimos
			corporis modi voluptatum fugiat!
		</f7-block>
	</f7-page>
</template>
<script>
	import {EventBus} from "../event-bus";

	export default {

		name: 'Dashboard',
		data() {
			return {
				title: 'Hello World'
			};
		},
		methods: {
			login() {
				this.$db("token", "testoken");
				this.$f7router.navigate("/dashboard");
			}
		}
	};
</script>
