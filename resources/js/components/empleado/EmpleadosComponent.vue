<template>
		<div class="row row-cols-1 row-cols-md-3">
  <div class="col mb-4" v-for="empleado in empleados" :key="empleado.id">
    <div class="card">
		<img :src="`/empleados/foto/${empleado.foto}`" class="card-img-top" alt="..." v-if="empleado.foto">
		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Sin_foto.svg/768px-Sin_foto.svg.png" class="card-img-top" alt="..." v-else>
		<div class="card-body">
		<h5 class="card-title">DNI: {{ empleado.dni }} {{ empleado.nombre }} {{ empleado.apellido }}</h5>
		<p class="card-text">{{ empleado.departamento }} - {{ empleado.ciudad }}</p>

		<a :href="`/empleados/${empleado.id}`" class="btn btn-success">Ver</a>
		</div>
	</div>
    
  </div>
  
</div>
</template>
<script>
	//import EmpleadoCardComponent from './EmpleadoCardComponent.vue';
	export default {
		props: ['lstEmpleados'],
		data(){
			return {
				empleados: [],
			}
		},
		created(){
			this.empleados = this.lstEmpleados;
		},
		watch: {
			lstEmpleados(){
				this.empleados = this.lstEmpleados;
			}
		}
		/*components: {
			EmpleadoCardComponent
		}*/
	}
</script>