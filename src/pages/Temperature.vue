<template>
	<f7-page name="about">
		<f7-navbar sliding>
			<f7-nav-left>
				<f7-link icon-f7="icon-bars" panel-open="left"></f7-link>
			</f7-nav-left>
			<f7-nav-title>
				Temperature
			</f7-nav-title>
		</f7-navbar>
		<f7-block-title>Current temperature</f7-block-title>
		<f7-block inner>
			<b class="big-number">{{ temperature ? temperature.value : "-" }} °C</b>
		</f7-block>
		<f7-block-title>Temperature control</f7-block-title>
		<f7-block inner>
			<f7-list no-hairlines-md style="margin-top: 0">
				<f7-list-item>
					<span>Regulate temperature</span>
					<f7-toggle :checked="active" @toggle:change="active = $event"></f7-toggle>
				</f7-list-item>
				<f7-list-input :value="min"
							   @input="min = $event.target.value"
							   type="number"
							   outline
							   min="-20"
							   max="50"
							   :disabled="!active"
							   label="Minimal temperature"/>
				<f7-list-input :value="max"
							   @input="max = $event.target.value"
							   type="number"
							   outline
							   min="-20"
							   max="50"
							   :disabled="!active"
							   label="Maximal temperature"/>
			</f7-list>
			<f7-button :raised="true" :fill="true" text="Save" type="button" @click="save"/>
		</f7-block>
	</f7-page>
</template>

<script>
	export default {
		name: 'About',
		data() {
			return {
				active: false,
				min: null,
				max: null,
				temperature: null
			};
		},
		methods: {
			save() {
				let data = {
					active: this.active,
					min: this.min,
					max: this.max
				};
				this.$api({
					url: "temperature/settings",
					sendToken: false,
					data: data
				}).then(d => {
					this.$toast("Temperature settings successfully edited");
					this.$db("temperature-settings", data);
				}).catch(() => {
					this.$toast("Settings editation failed, please try again");
				});
			}
		},
		created() {
			if (this.$db("temperature-settings")) {
				let settings = this.$db("temperature-settings");
				this.active = settings.active;
				this.min = settings.min;
				this.max = settings.max;
			} else
				this.$api({
					url: "temperature/settings",
					method: "GET"
				}).then(d => {
					let data = d.data;
					this.$db("temperature-settings", data);
					this.active = data.active;
					this.min = data.min ? data.min : null;
					this.max = data.max ? data.max : null;
				});

			if (this.$db("temperature"))
				this.temperature = this.$db("temperature");
			else
				this.$api({
					url: "temperature",
					method: "GET"
				}).then(d => {
					this.$db("temperature", d.data);
					this.temperature = d.data;
				});
		}

	};
</script>
