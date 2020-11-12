<template>
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CRUD DE EMPLEADOS</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="/empleados/create" class="btn btn-primary btn-lg float-right">Crear</a>
                            </div>
                        </div>
                        <hr>
                        <form @submit.prevent="fxBuscar">
                            <div class="form-group">
                                <label>Buscar por DNI</label>
                                <input type="text" v-model="dni" class="form-control" placeholder="Ingrese DNI">
                            </div>
                        </form>
                        <hr>
                        <button type="button" class="btn btn-primary btn-sm" onclick="location.reload();">Ver todo</button>
                        <hr>
                        <empleados-component :lst-empleados="empleados"></empleados-component>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import EmpleadosComponent from './empleado/EmpleadosComponent.vue';
    export default {
        props: ['lstEmpleados'],
        data(){
            return {
                dni: '',
                empleados: []
            }
        },
        created(){
            this.empleados = this.lstEmpleados;
        },
        methods: {
            fxBuscar(){
                if(this.dni){
                    //peticion al servidor
                    let dni = this.dni.trim();
                    axios.get(`/empleados/search/${dni}`)
                    .then((response) => {
                        console.log('respons es: ');
                        console.log(response);
                        this.$set(this,'empleados',response.data);
                    });
                }
            }
        },
        components: {
            EmpleadosComponent
        }
    }
</script>
