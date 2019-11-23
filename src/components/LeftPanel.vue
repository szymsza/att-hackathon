<template>
	<f7-panel left :reveal="isiOS" :effect="panelEffect">
		<f7-navbar title="Menu"></f7-navbar>
		<!-- force page background color to white if on iOS -->
		<f7-page :style="pageStyle">
			<f7-list>
				<f7-list-item
					link="/dashboard/"
					link-view="#main-view"
					panel-close
					reload-all
				>
					<template slot="content-start">
						<f7-icon f7="uiwindow_split_2x1"/>
						Dashboard
					</template>
				</f7-list-item>
				<f7-list-item
					link="/temperature/"
					link-view="#main-view"
					panel-close
					reload-all
				>
					<template slot="content-start">
						<f7-icon f7="thermometer"/>
						Temperature
					</template>
				</f7-list-item>
				<f7-list-item
					link="/door/"
					link-view="#main-view"
					panel-close
					reload-all
				>
					<template slot="content-start">
						<f7-icon f7="house_fill"/>
						Door settings
					</template>
				</f7-list-item>
				<f7-list-item
					link="/logout/"
					link-view="#main-view"
					panel-close
					reload-all
				>
					<template slot="content-start">
						<f7-icon f7="arrow_uturn_left"/>
						Logout
					</template>
				</f7-list-item>
			</f7-list>
		</f7-page>
	</f7-panel>
</template>

<script>
	export default {
		name: 'LeftPanel',
		data() {
			return {
				isMaterial: window.isMaterial,
				isiOS: window.isiOS
			};
		},
		computed: {
			pageStyle() {
				return this.isiOS ? 'background-color: white;' : '';
			},
			panelEffect() {
				return this.isiOS ? 'reveal' : 'cover';
			}
		}
	};
</script>

<style scoped>
	.panel-left .page {
		margin-top: 44px;
		padding-bottom: 44px;
	}

	@media (min-width: 960px) {
		.panel.panel-left {
			border-right: 1px solid #b2b2b2;
		}
	}
</style>
