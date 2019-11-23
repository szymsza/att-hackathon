<template>
	<f7-page>
		<f7-navbar sliding>
			<f7-nav-title>
				Login
			</f7-nav-title>
		</f7-navbar>
		<f7-block inner>
			<f7-list no-hairlines-md>
				<f7-list-input :value="email"
							   @input="email = $event.target.value"
							   type="email"
							   outline
							   placeholder="Your email"/>
				<f7-list-input :value="password"
							   @input="password = $event.target.value"
							   type="password"
							   outline
							   placeholder="Your password"/>
			</f7-list>
			<f7-button :raised="true" :fill="true" text="login" type="button" @click="login"/>
		</f7-block>
	</f7-page>
</template>
<script>
	export default {

		name: 'Dashboard',
		data() {
			return {
				email: null,
				password: null
			};
		},
		methods: {
			login() {
				this.$api({
					url: "login",
					sendToken: false,
					data: {
						email: this.email,
						password: this.password
					}
				}).then(d => {
					this.$db("token", d.data.token);
					this.$f7router.navigate("/dashboard");
				}).catch(() => {
					this.$toast("Login has failed, please try again");
					this.password = null;
				});
			}
		}
	};
</script>
