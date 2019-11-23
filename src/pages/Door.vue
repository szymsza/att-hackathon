<template>
	<f7-page name="door">
		<f7-navbar sliding>
			<f7-nav-left>
				<f7-link icon-f7="icon-bars" panel-open="left"></f7-link>
			</f7-nav-left>
			<f7-nav-title>
				Door control settings
			</f7-nav-title>
		</f7-navbar>
		<f7-block-title>Open and close the door</f7-block-title>
		<f7-block inner>
			<f7-list no-hairlines-md style="margin-top: 0">
				<f7-list-item>
					<span>Based on sunlight</span>
					<f7-toggle :checked="timer" @toggle:change="timer = $event"></f7-toggle>
					<span>Based on time</span>
				</f7-list-item>
				<template v-if="timer">
					<f7-list-input :value="open_time"
								   @input="open_time = $event.target.value"
								   type="text"
								   outline
								   label="Opening time"/>
					<f7-list-input :value="close_time"
								   @input="close_time = $event.target.value"
								   type="text"
								   label="Closing time"/>
				</template>
				<f7-list-input :value="village"
							   @input="village = $event.target.value"
							   type="text"
							   outline
							   v-else
							   label="Village"/>
				<f7-list-item>
					<span>With all chickens inside only</span>
					<f7-toggle :checked="all_chicken" @toggle:change="all_chicken = $event" />
				</f7-list-item>
				<f7-list-input :value="min_chicken"
							   @input="min_chicken = $event.target.value"
							   type="number"
							   outline
							   min="0"
							   max="150"
							   :disabled="!all_chicken"
							   label="Number of chickens"/>
			</f7-list>
			<f7-button :raised="true" :fill="true" text="Save" type="button" @click="save"/>
		</f7-block>
	</f7-page>
</template>

<script>
	export default {
		name: 'Door',
		data() {
			return {
				timer: false,
				open_time: "",
				close_time: "",
				village: "",
				all_chicken: false,
				min_chicken: null
			};
		},
		methods: {
			save() {
				let data = {
					timer: this.timer,
					open_time: this.open_time,
					close_time: this.close_time,
					village: this.village,
					min_chicken: this.all_chicken ? this.min_chicken : 0
				};
				this.$api({
					url: "door/settings",
					data: data
				}).then(() => {
					this.$toast("Door settings successfully edited");
					this.$db("door-settings", data);
				}).catch(() => {
					this.$toast("Settings editation failed, please try again");
				});
			}
		},
		created() {
			if (this.$db("door-settings")) {
				let settings = this.$db("door-settings");
				this.timer = settings.timer;
				this.open_time = settings.open_time;
				this.close_time = settings.close_time;
				this.village = settings.village;
				this.all_chicken = settings.min_chicken > 0;
				this.min_chicken = settings.min_chicken;
			} else
				this.$api({
					url: "door/settings",
					method: "GET"
				}).then(d => {
					let data = d.data;
					this.$db("door-settings", data);
					this.timer = data.timer;
					this.open_time = data.open_time;
					this.close_time = data.close_time;
					this.village = data.village;
					this.all_chicken = data.min_chicken > 0;
					this.min_chicken = data.min_chicken;
				});
		}
	};
</script>
