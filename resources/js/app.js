require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

Vue.component('add-new', require('./components/AddNew.vue').default);

Vue.component('user-box', require('./components/UserBox.vue').default);


const app = document.getElementById('app');

new Vue({
	data: {
		new_: [],
	},
	created() {
	},
	watch:{
		
	},
	methods: {
		add_(){
			this.new_.push(1);
		},

	},
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);

$(document).ready(function(){
	//display the session messagges
	if(document.getElementById('session_message')){
		swal({title:"Hecho!", html:true, text:$('#session_message').data("message"), type:"success"});
	}
	if(document.getElementById('session_errorMessage')){
		swal("Error!", $('#session_errorMessage').data("message"), "error");
	}

	//display message for each form action
	$('form').submit(function(){
		swal({title: "Cargando", text: "Se esta realizando la acción", type: "info", showConfirmButton: false});
	});

	//if the browser is from ios then we change the image format
	if (navigator.userAgent.match(/(iPod|iPhone|iPad|Mac|MacIntel|MacPPC|iPadMac68K)/)){
			$('img').each(function(){
				var src = $(this).prop('src');
				src = src.replace('webp', 'jpg');
				$(this).prop('src', src);
			});
		}
	});