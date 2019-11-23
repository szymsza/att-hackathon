<template>
	<f7-page name="another">
	</f7-page>
</template>

<script>
	import { EventBus } from "../event-bus";
	export default {
		name: 'Another',
		data() {
			return {
				title: 'Another Page'
			};
		},
		mounted() {
			EventBus.$emit("logout", "token");
			this.$f7router.navigate("/");
		}
	};
</script>
