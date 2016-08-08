<template>
	<div>
		<progress :percent.sync="myProgress.percent" :options="myProgress.options"> </progress>
		<header-figure></header-figure>
		<sidebar-figure></sidebar-figure>
		<div class="content-wrapper">
  			<router-view></router-view>
		</div>
		<footer-figure></footer-figure>
	</div>
</template>
<script>
	import HeaderFigure from './components/partials/header.vue';
	import SidebarFigure from './components/partials/sidebar.vue';
	import FooterFigure from './components/partials/footer.vue';
	import Progress from 'vue-progressbar/vue-progressbar.vue';
	export default {
		data: function () {
			return {
				myProgress: {
	              percent: 0,
	              options: {
	                show: true,
	                canSuccess: true,
	                color: 'rgb(143, 255, 199)',
	                failedColor: 'red',
	                height: '2px'
	              }
	            },
			}
		},
		created: function () {
			this.$progress.setHolder(this.myProgress);
		},
		components: {HeaderFigure, SidebarFigure, FooterFigure, Progress}
	}
</script>